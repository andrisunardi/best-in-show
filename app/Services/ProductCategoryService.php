<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryService
{
    public function index(
        string|int $pet_id = '',
        string|int $product_type_id = '',
        string $name = '',
        string $name_idn = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $productCategories = ProductCategory::with('pet', 'productType.pet', 'products')
            ->when($pet_id, fn ($q) => $q->where('pet_id', $pet_id))
            ->when($product_type_id, fn ($q) => $q->where('product_type_id', $product_type_id))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $productCategories->paginate($per_page);
        }

        return $productCategories->get();
    }

    public function add(array $data = []): ProductCategory
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-category',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return ProductCategory::create($data);
    }

    public function clone(array $data, ProductCategory $productCategory): ProductCategory
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-category',
            checkAsset: $productCategory->checkImage(),
            fileAsset: $productCategory->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return ProductCategory::create($data);
    }

    public function edit(ProductCategory $productCategory, array $data = []): ProductCategory
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-category',
            checkAsset: $productCategory->checkImage(),
            fileAsset: $productCategory->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $productCategory->update($data);
        $productCategory->refresh();

        return $productCategory;
    }

    public function active(ProductCategory $productCategory): ProductCategory
    {
        $productCategory->is_active = ! $productCategory->is_active;
        $productCategory->save();
        $productCategory->refresh();

        return $productCategory;
    }

    public function deleteImage(ProductCategory $productCategory)
    {
        $productCategory->deleteImage();

        $productCategory->image = null;
        $productCategory->save();
        $productCategory->refresh();

        return $productCategory;
    }

    public function delete(ProductCategory $productCategory): bool
    {
        return $productCategory->delete();
    }

    public function deleteAll(array $productCategories = []): bool
    {
        return ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->delete();
    }

    public function restore(ProductCategory $productCategory): bool
    {
        return $productCategory->restore();
    }

    public function restoreAll(array $productCategories = []): bool
    {
        return ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(ProductCategory $productCategory): bool
    {
        $productCategory->deleteImage();

        return $productCategory->forceDelete();
    }

    public function deletePermanentAll(array $productCategories = []): bool
    {
        $productCategories = ProductCategory::when($productCategories, fn ($q) => $q->whereIn('id', $productCategories))->onlyTrashed()->get();

        foreach ($productCategories as $productCategory) {
            $productCategory->deleteImage();
            $productCategory->forceDelete();
        }

        return true;
    }
}
