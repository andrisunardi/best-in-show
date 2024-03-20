<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Pet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PetService
{
    public function index(
        string $name = '',
        string $name_idn = '',
        string $youtube = '',
        array $is_active = [],
        string|int $role_id = '',
        string $permission_name = '',
        string $orderBy = 'id',
        string $sortBy = 'desc',
        bool $paginate = true,
        int $per_page = 10,
        bool $trash = false,
    ): object {
        $pets = Pet::with('productTypes', 'productCategories')
            ->when($name, fn ($q) => $q->where('name', 'LIKE', "%{$name}%"))
            ->when($name_idn, fn ($q) => $q->where('name_idn', 'LIKE', "%{$name_idn}%"))
            ->when($youtube, fn ($q) => $q->where('youtube', 'LIKE', "%{$youtube}%"))
            ->when($is_active, fn ($q) => $q->whereIn('is_active', $is_active))
            ->when($role_id, fn ($q) => $q->role($role_id))
            ->when($permission_name, fn ($q) => $q->permission($permission_name))
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy);

        if ($paginate) {
            return $pets->paginate($per_page);
        }

        return $pets->get();
    }

    public function add(array $data = []): Pet
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            deleteAsset: false,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'pet',
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        $pet = Pet::create($data);

        return $pet;
    }

    public function clone(array $data, Pet $pet): Pet
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            checkAsset: $pet->checkProductImage(),
            fileAsset: $pet->image,
            deleteAsset: false,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'pet',
            checkAsset: $pet->checkImage(),
            fileAsset: $pet->image,
            deleteAsset: false,
        );

        $data['slug'] = Str::slug($data['name']);

        $pet = Pet::create($data);

        return $pet;
    }

    public function edit(Pet $pet, array $data = []): Pet
    {
        $data['product_image'] = LivewireUpload::upload(
            file: $data['product_image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product-image',
            checkAsset: $pet->checkProductImage(),
            fileAsset: $pet->image,
            deleteAsset: true,
        );

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'pet',
            checkAsset: $pet->checkImage(),
            fileAsset: $pet->image,
            deleteAsset: true,
        );

        $data['slug'] = Str::slug($data['name']);

        $pet->update($data);
        $pet->refresh();

        return $pet;
    }

    public function active(Pet $pet): Pet
    {
        $pet->is_active = ! $pet->is_active;
        $pet->save();
        $pet->refresh();

        return $pet;
    }

    public function deleteProductImage(Pet $pet)
    {
        $pet->deleteProductImage();

        $pet->product_image = null;
        $pet->save();
        $pet->refresh();

        return $pet;
    }

    public function deleteImage(Pet $pet)
    {
        $pet->deleteImage();

        $pet->image = null;
        $pet->save();
        $pet->refresh();

        return $pet;
    }

    public function delete(Pet $pet): bool
    {
        return $pet->delete();
    }

    public function deleteAll(array $pets = []): bool
    {
        return Pet::when($pets, fn ($q) => $q->whereIn('id', $pets))->delete();
    }

    public function restore(Pet $pet): bool
    {
        return $pet->restore();
    }

    public function restoreAll(array $pets = []): bool
    {
        return Pet::when($pets, fn ($q) => $q->whereIn('id', $pets))->onlyTrashed()->restore();
    }

    public function deletePermanent(Pet $pet): bool
    {
        $pet->deleteProductImage();
        $pet->deleteImage();

        return $pet->forceDelete();
    }

    public function deletePermanentAll(array $pets = []): bool
    {
        $pets = Pet::when($pets, fn ($q) => $q->whereIn('id', $pets))->onlyTrashed()->get();

        foreach ($pets as $pet) {
            $pet->deleteProductImage();
            $pet->deleteImage();
            $pet->forceDelete();
        }

        return true;
    }

    public function resetPassword(Pet $pet): string
    {
        $password = Str::random(5);
        $pet->update(['password' => Hash::make($password)]);
        $pet->refresh();

        return $password;
    }
}
