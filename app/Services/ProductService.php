<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    public function index(
        string|int|null $pet_id = null,
        string $name = '',
        string $name_idn = '',
        array $is_active = [],
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $products = Product::with('pet', 'category.pet', 'type.pet')
            ->when($pet_id, fn ($q) => $q->where('pet_id', $pet_id))
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $products->paginate($per_page);
        }

        return $products->get();
    }

    public function add(array $data = []): Product
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return Product::create($data);
    }

    public function clone(array $data, Product $product): Product
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product',
            checkAsset: $product->checkImage(),
            fileAsset: $product->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        return Product::create($data);
    }

    public function edit(Product $product, array $data = []): Product
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product',
            checkAsset: $product->checkImage(),
            fileAsset: $product->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $product->update($data);
        $product->refresh();

        return $product;
    }

    public function active(Product $product): Product
    {
        $product->is_active = ! $product->is_active;
        $product->save();
        $product->refresh();

        return $product;
    }

    public function deleteImage(Product $product)
    {
        $product->deleteImage();

        $product->image = null;
        $product->save();
        $product->refresh();

        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function deleteAll(array $products = []): bool
    {
        return Product::when($products, fn ($q) => $q->whereIn('id', $products))->delete();
    }

    public function restore(Product $product): bool
    {
        return $product->restore();
    }

    public function restoreAll(array $products = []): bool
    {
        return Product::when($products, fn ($q) => $q->whereIn('id', $products))->onlyTrashed()->restore();
    }

    public function deletePermanent(Product $product): bool
    {
        $product->deleteImage();

        return $product->forceDelete();
    }

    public function deletePermanentAll(array $products = []): bool
    {
        $products = Product::when($products, fn ($q) => $q->whereIn('id', $products))->onlyTrashed()->get();

        foreach ($products as $product) {
            $product->deleteImage();
            $product->forceDelete();
        }

        return true;
    }
}
