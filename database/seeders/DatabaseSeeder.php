<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,

            PetSeeder::class,
            BannerSeeder::class,
            ProductTypeSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            PromotionSeeder::class,
            // SliderSeeder::class,
            StoreSeeder::class,
        ]);
    }
}
