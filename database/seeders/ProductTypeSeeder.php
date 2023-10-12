<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        // DOG
        $data = new ProductType();
        $data->pet_id = '1';
        $data->name = 'Dry Food';
        $data->name_idn = 'Makanan Kering';
        // $data->icon = "dog-dry-food.png";
        $data->image = 'dog-dry-food.png';
        $data->slug = 'dry-food';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '1';
        $data->name = 'Wet Food';
        $data->name_idn = 'Makanan Basah';
        // $data->icon = "dog-wet-food.png";
        $data->image = 'dog-wet-food.png';
        $data->slug = 'wet-food';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '1';
        $data->name = 'Snack';
        $data->name_idn = 'Makanan Ringan';
        // $data->icon = "dog-snack.png";
        $data->image = 'dog-snack.png';
        $data->slug = 'snack';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '1';
        $data->name = 'Accessories';
        $data->name_idn = 'Aksesoris';
        // $data->icon = "dog-accessories.png";
        $data->image = 'dog-accessories.png';
        $data->slug = 'accessories';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '1';
        $data->name = 'Treatment';
        $data->name_idn = 'Perawatan';
        // $data->icon = "dog-treatment.png";
        $data->image = 'dog-treatment.png';
        $data->slug = 'treatment';
        $data->save();
        // DOG

        // CAT
        $data = new ProductType();
        $data->pet_id = '2';
        $data->name = 'Dry Food';
        $data->name_idn = 'Makanan Kering';
        // $data->icon = "cat-dry-food.png";
        $data->image = 'cat-dry-food.png';
        $data->slug = 'dry-food';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '2';
        $data->name = 'Wet Food';
        $data->name_idn = 'Makanan Basah';
        // $data->icon = "cat-wet-food.png";
        $data->image = 'cat-wet-food.png';
        $data->slug = 'wet-food';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '2';
        $data->name = 'Snack';
        $data->name_idn = 'Makanan Ringan';
        // $data->icon = "cat-snack.png";
        $data->image = 'cat-snack.png';
        $data->slug = 'snack';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '2';
        $data->name = 'Accessories';
        $data->name_idn = 'Aksesoris';
        // $data->icon = "cat-accessories.png";
        $data->image = 'cat-accessories.png';
        $data->slug = 'accessories';
        $data->save();

        $data = new ProductType();
        $data->pet_id = '2';
        $data->name = 'Treatment';
        $data->name_idn = 'Perawatan';
        // $data->icon = "cat-treatment.png";
        $data->image = 'cat-treatment.png';
        $data->slug = 'treatment';
        $data->save();
        // CAT

        // SMALL ANIMAL
        $data = new ProductType();
        $data->pet_id = '3';
        $data->name = 'Dry Food';
        $data->name_idn = 'Makanan Kering';
        // $data->icon = "small-animal-dry-food.png";
        $data->image = 'small-animal-dry-food.png';
        $data->slug = 'dry-food';
        $data->save();
        // SMALL ANIMAL

        // SMALL ANIMAL
        $data = new ProductType();
        $data->pet_id = '3';
        $data->name = 'Accessories';
        $data->name_idn = 'Aksesoris';
        // $data->icon = "small-animal-accessories.png";
        $data->image = 'small-animal-accessories.png';
        $data->slug = 'accessories';
        $data->save();
        // SMALL ANIMAL
    }
}
