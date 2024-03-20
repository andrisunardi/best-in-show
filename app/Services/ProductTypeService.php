<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\ProductType;
use Illuminate\Support\Str;

class ProductTypeService
{
    public function index(
        string|int $pet_id = '',
        string $name = '',
        string $name_idn = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $productTypes = ProductType::with('pet', 'productCategories', 'products')
            ->when($pet_id, fn ($q) => $q->where('pet_id', $pet_id))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $productTypes->paginate($per_page);
        }

        return $productTypes->get();
    }

    public function add(array $data = []): ProductType
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-type',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return ProductType::create($data);
    }

    public function clone(array $data, ProductType $productType): ProductType
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-type',
            checkAsset: $productType->checkImage(),
            fileAsset: $productType->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return ProductType::create($data);
    }

    public function edit(ProductType $productType, array $data = []): ProductType
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-type',
            checkAsset: $productType->checkImage(),
            fileAsset: $productType->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $productType->update($data);
        $productType->refresh();

        return $productType;
    }

    public function active(ProductType $productType): ProductType
    {
        $productType->is_active = ! $productType->is_active;
        $productType->save();
        $productType->refresh();

        return $productType;
    }

    public function deleteImage(ProductType $productType)
    {
        $productType->deleteImage();

        $productType->image = null;
        $productType->save();
        $productType->refresh();

        return $productType;
    }

    public function delete(ProductType $productType): bool
    {
        return $productType->delete();
    }

    public function deleteAll(array $productTypes = []): bool
    {
        return ProductType::when($productTypes, fn ($q) => $q->whereIn('id', $productTypes))->delete();
    }

    public function restore(ProductType $productType): bool
    {
        return $productType->restore();
    }

    public function restoreAll(array $productTypes = []): bool
    {
        return ProductType::when($productTypes, fn ($q) => $q->whereIn('id', $productTypes))->onlyTrashed()->restore();
    }

    public function deletePermanent(ProductType $productType): bool
    {
        $productType->deleteImage();

        return $productType->forceDelete();
    }

    public function deletePermanentAll(array $productTypes = []): bool
    {
        $productTypes = ProductType::when($productTypes, fn ($q) => $q->whereIn('id', $productTypes))->onlyTrashed()->get();

        foreach ($productTypes as $productType) {
            $productType->deleteImage();
            $productType->forceDelete();
        }

        return true;
    }
}
