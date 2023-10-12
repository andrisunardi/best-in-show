<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        // DOG, MINUMAN, Good Dog Milk

        // DOG DRY FOOD
        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Super Premium';
        $data->name_idn = 'Super Premium';
        $data->image = 'dog-dry-food-super-premium.png';
        $data->slug = 'super-premium';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Show Dogs';
        $data->name_idn = 'Anjing Pameran';
        $data->image = 'dog-dry-food-show-dog.png';
        $data->slug = 'show-dog';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Holistic';
        $data->name_idn = 'Holistic';
        $data->image = 'dog-dry-food-holistic.png';
        $data->slug = 'holistic';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Speciality';
        $data->name_idn = 'Speciality';
        $data->image = 'dog-dry-food-speciality.png';
        $data->slug = 'speciality';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Grain Free Food';
        $data->name_idn = 'Grain Free Food';
        $data->image = 'dog-dry-food-grain-free-food.png';
        $data->slug = 'grain-free-food';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Special Diet';
        $data->name_idn = 'Special Diet';
        $data->image = 'dog-dry-food-special-diet.png';
        $data->slug = 'special-diet';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Every Day';
        $data->name_idn = 'Anjing Sehari-hari';
        $data->image = 'dog-dry-food-every-day.png';
        $data->slug = 'everyday';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Economy';
        $data->name_idn = 'Ekonomis';
        $data->image = 'dog-dry-food-economy.png';
        $data->slug = 'economy';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->name = 'Future';
        $data->name_idn = 'Masa Depan';
        $data->image = 'dog-dry-food-future.png';
        $data->slug = 'future';
        $data->deleted_at = now();
        $data->save();
        // DOG DRY FOOD

        // DOG WET FOOD
        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '2';
        $data->name = 'Super Premium';
        $data->name_idn = 'Super Premium';
        $data->image = 'dog-wet-food-super-premium.png';
        $data->slug = 'super-premium';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '2';
        $data->name = 'Speciality';
        $data->name_idn = 'Speciality';
        $data->image = 'dog-wet-food-speciality.png';
        $data->slug = 'speciality';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '2';
        $data->name = 'Every Day';
        $data->name_idn = 'Anjing Sehari-hari';
        $data->image = 'dog-wet-food-every-day.png';
        $data->slug = 'everyday';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '2';
        $data->name = 'Economy';
        $data->name_idn = 'Ekonomis';
        $data->image = 'dog-wet-food-economy.png';
        $data->slug = 'economy';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '2';
        $data->name = 'Future';
        $data->name_idn = 'Masa Depan';
        $data->image = 'dog-wet-food-future.png';
        $data->slug = 'future';
        $data->deleted_at = now();
        $data->save();
        // DOG WET FOOD

        // DOG SNACK
        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '3';
        $data->name = 'BIS JERKY';
        $data->name_idn = 'BIS JERKY';
        $data->image = 'dog-snack-bis-jerky.png';
        $data->slug = 'bis-jerky';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '3';
        $data->name = 'Snack Bones';
        $data->name_idn = 'Snack Bones';
        $data->image = 'dog-snack-snack-bones.png';
        $data->slug = 'snack-bones';
        $data->save();
        // DOG SNACK

        // DOG ACCESSORIES
        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '4';
        $data->name = 'Cage';
        $data->name_idn = 'Kandang';
        $data->image = 'dog-accessories-cage.png';
        $data->slug = 'cage';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '4';
        $data->name = 'Rope';
        $data->name_idn = 'Tali';
        $data->image = 'dog-accessories-rope.png';
        $data->slug = 'rope';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '4';
        $data->name = 'Bowl';
        $data->name_idn = 'BOWL & SCOOP';
        $data->image = 'dog-accessories-bowl.png';
        $data->slug = 'bowl';
        $data->save();
        // DOG ACCESSORIES

        // DOG TREATMENT
        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '5';
        $data->name = 'Grooming';
        $data->name_idn = 'Grooming';
        $data->image = 'dog-treatment-grooming.png';
        $data->slug = 'grooming';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '1';
        $data->product_type_id = '5';
        $data->name = 'Vitamin';
        $data->name_idn = 'Obat-Obatan';
        $data->image = 'dog-treatment-vitamin.png';
        $data->slug = 'vitamin';
        $data->save();
        // DOG TREATMENT

        // CAT DRY FOOD
        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Holistic';
        $data->name_idn = 'Holistic';
        $data->image = 'cat-dry-food-holistic.png';
        $data->slug = 'holistic';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Super Premium';
        $data->name_idn = 'Super Premium';
        $data->image = 'cat-dry-food-super-premium.png';
        $data->slug = 'super-premium';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Japanese Formula';
        $data->name_idn = 'Japanese Formula';
        $data->image = 'cat-dry-food-japanese-formula.png';
        $data->slug = 'japanese-formula';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Special Needs Food';
        $data->name_idn = 'Special Needs Food';
        $data->image = 'cat-dry-food-special-needs-food.png';
        $data->slug = 'special-needs-food';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Every Day';
        $data->name_idn = 'Kucing Sehari-hari';
        $data->image = 'cat-dry-food-every-day.png';
        $data->slug = 'everyday';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Economy';
        $data->name_idn = 'Ekonomis';
        $data->image = 'cat-dry-food-economy.png';
        $data->slug = 'economy';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '6';
        $data->name = 'Future';
        $data->name_idn = 'Masa Depan';
        $data->image = 'cat-dry-food-future.png';
        $data->slug = 'future';
        $data->deleted_at = now();
        $data->save();
        // CAT DRY FOOD

        // CAT WET FOOD
        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '7';
        $data->name = 'Super Premium';
        $data->name_idn = 'Super Premium';
        $data->image = 'cat-wet-food-super-premium.png';
        $data->slug = 'super-premium';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '7';
        $data->name = 'Japanese Formula';
        $data->name_idn = 'Japanese Formula';
        $data->image = 'cat-wet-food-japanese-formula.png';
        $data->slug = 'japanese-formula';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '7';
        $data->name = 'Future';
        $data->name_idn = 'Masa Depan';
        $data->image = 'cat-wet-food-future.png';
        $data->slug = 'future';
        $data->deleted_at = now();
        $data->save();
        // CAT WET FOOD

        // CAT SNACK
        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '8';
        $data->name = 'Liquid Snack';
        $data->name_idn = 'Liquid Snack';
        $data->image = 'cat-snack-liquid-snack.png';
        $data->slug = 'liquid-snack';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '8';
        $data->name = 'Loin';
        $data->name_idn = 'Loin';
        $data->image = 'cat-snack-loin.png';
        $data->slug = 'loin';
        $data->save();
        // CAT SNACK

        // CAT ACCESSORIES
        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Cage';
        $data->name_idn = 'Kandang';
        $data->image = 'cat-accessories-cage.png';
        $data->slug = 'cage';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Cosmo Cat';
        $data->name_idn = 'Cosmo Cat';
        $data->image = 'cat-accessories-cosmo-cat.png';
        $data->slug = 'cosmo-cat';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Cat Litter Box';
        $data->name_idn = 'Cat Litter Box';
        $data->image = 'cat-accessories-cat-litter-box.png';
        $data->slug = 'cat-litter-box';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Bottle';
        $data->name_idn = 'Bottle';
        $data->image = 'cat-accessories-bottle.png';
        $data->slug = 'bottle';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Rope';
        $data->name_idn = 'Tali';
        $data->image = 'cat-accessories-rope.png';
        $data->slug = 'rope';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '9';
        $data->name = 'Bowl';
        $data->name_idn = 'Bowl';
        $data->image = 'cat-accessories-bowl.png';
        $data->slug = 'bowl';
        $data->save();
        // CAT ACCESSORIES

        // CAT TREATMENT
        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '10';
        $data->name = 'Grooming';
        $data->name_idn = 'Grooming';
        $data->image = 'cat-treatment-grooming.png';
        $data->slug = 'grooming';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '10';
        $data->name = 'Vitamin';
        $data->name_idn = 'Obat-Obatan';
        $data->image = 'cat-treatment-vitamin.png';
        $data->slug = 'vitamin';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '2';
        $data->product_type_id = '10';
        $data->name = 'Sand';
        $data->name_idn = 'Pasir';
        $data->image = 'cat-treatment-sand.png';
        $data->slug = 'sand';
        $data->save();
        // CAT TREATMENT

        // SMALL ANIMAL DRY FOOD
        $data = new ProductCategory();
        $data->pet_id = '3';
        $data->product_type_id = '11';
        $data->name = 'Rabbit';
        $data->name_idn = 'Kelinci';
        $data->image = 'small-animal-dry-food-rabbit.png';
        $data->slug = 'rabbit';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '3';
        $data->product_type_id = '11';
        $data->name = 'Hamster';
        $data->name_idn = 'Hamster';
        $data->image = 'small-animal-dry-food-hamster.png';
        $data->slug = 'hamster';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '3';
        $data->product_type_id = '11';
        $data->name = 'Turtle';
        $data->name_idn = 'Kura-kura';
        $data->image = 'small-animal-dry-food-turtle.png';
        $data->slug = 'turtle';
        $data->save();
        // SMALL ANIMAL DRY FOOD

        // SMALL ANIMAL DRY FOOD
        $data = new ProductCategory();
        $data->pet_id = '3';
        $data->product_type_id = '12';
        $data->name = 'Cage';
        $data->name_idn = 'Kandang';
        $data->image = 'small-animal-accessories-cage.png';
        $data->slug = 'cage';
        $data->save();

        $data = new ProductCategory();
        $data->pet_id = '3';
        $data->product_type_id = '12';
        $data->name = 'Bottle';
        $data->name_idn = 'Botol';
        $data->image = 'small-animal-accessories-bottle.png';
        $data->slug = 'bottle';
        $data->save();
        // SMALL ANIMAL DRY FOOD
    }
}
