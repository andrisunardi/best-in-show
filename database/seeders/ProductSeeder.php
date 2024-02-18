<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // DOG
        // DRY FOOD
        // Super Premium
        // Good Dog
        // Puppy - Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '100gr';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // dog-dry-food-dry-food-good-dog

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '1.6kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '18kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy - Lamb & Rice

        // Adult - Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Lamb & Rice';
        $data->variant_idn = 'Lamb & Rice';
        $data->size = '100gr';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Lamb & Rice';
        $data->variant_idn = 'Lamb & Rice';
        $data->size = '1.6kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Lamb & Rice';
        $data->variant_idn = 'Lamb & Rice';
        $data->size = '18kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Lamb & Rice

        // Adult - Show Performance
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Adult - Show Performance';
        $data->variant_idn = 'Adult - Show Performance';
        $data->size = '100gr';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Adult - Show Performance';
        $data->variant_idn = 'Adult - Show Performance';
        $data->size = '1.6kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '1';
        $data->name = 'Good Dog';
        $data->name_idn = 'Good Dog';
        $data->description = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->description_idn = 'Best In Show - Good Dog merupakan produk makanan anjing Super Premium yang mengandung asam amino, lemak vitamin dan mineral yang baik untuk kesehatan.';
        $data->variant = 'Adult - Show Performance';
        $data->variant_idn = 'Adult - Show Performance';
        $data->size = '18kg';
        $data->color = null;
        $data->image = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-super-premium-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Show Performance
        // Good Dog
        // Super Premium

        // Show Dog
        // Professional Formula
        // Puppy
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '2';
        $data->name = 'Professional Formula';
        $data->name_idn = 'Professional Formula';
        $data->description = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->description_idn = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->variant = 'Puppy';
        $data->variant_idn = 'Puppy';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy

        // Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '2';
        $data->name = 'Professional Formula';
        $data->name_idn = 'Professional Formula';
        $data->description = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->description_idn = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->variant = 'Lamb & Rice';
        $data->variant_idn = 'Lamb & Rice';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Lamb & Rice

        // Beef 14kg
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '2';
        $data->name = 'Professional Formula';
        $data->name_idn = 'Professional Formula';
        $data->description = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->description_idn = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->variant = 'Beef 14kg';
        $data->variant_idn = 'Beef 14kg';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Beef 14kg

        // High Energy
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '2';
        $data->name = 'Professional Formula';
        $data->name_idn = 'Professional Formula';
        $data->description = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->description_idn = 'Best In Show - Professional diformulasikan khusus untuk anjing yang dirawat oleh para profesional untuk keperluan show ataupun pameran.';
        $data->variant = 'High Energy';
        $data->variant_idn = 'High Energy';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-show-dogs-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // High Energy
        // Professional Formula
        // Show Dog

        // Holistic
        // Eureka Dog
        // Eureka Adult Dog Holistic - Salmon & Potato - Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '3';
        $data->name = 'Eureka Dog';
        $data->name_idn = 'Eureka Dog';
        $data->description = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->description_idn = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->variant = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->variant_idn = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->size = '7lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '3';
        $data->name = 'Eureka Dog';
        $data->name_idn = 'Eureka Dog';
        $data->description = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->description_idn = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->variant = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->variant_idn = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->size = '25lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '3';
        $data->name = 'Eureka Dog';
        $data->name_idn = 'Eureka Dog';
        $data->description = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->description_idn = 'Eureka Dog Holistic - Makanan anjing holistik dan nutrisi tinggi untuk kulit dan bulu yang indah. Dapat menjaga KESEHATAN pencernaan, dan dilengkapi dengan omega 3 dan omega 6';
        $data->variant = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->variant_idn = 'Eureka Adult Dog Holistic - Salmon & Potato';
        $data->size = '50lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-holistic-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Eureka Adult Dog Holistic - Salmon & Potato - Lamb & Rice
        // Eureka Dog
        // Holistic

        // Speciality
        // Bully Power
        // Puppy - Lamb
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '4';
        $data->name = 'Bully Power';
        $data->name_idn = 'Bully Power';
        $data->description = 'Bully Power memiliki palatabilitas yang sangat baik serta padat akan energi untuk memenuhi nutrisi yang dibutuhkan oleh anjing. Diperkaya dengan vitamin dan mineral juga antioksidan yang melindungi tubuh Anjing kesayangan dari bahaya radikal bebas.';
        $data->description_idn = 'Bully Power memiliki palatabilitas yang sangat baik serta padat akan energi untuk memenuhi nutrisi yang dibutuhkan oleh anjing. Diperkaya dengan vitamin dan mineral juga antioksidan yang melindungi tubuh Anjing kesayangan dari bahaya radikal bebas.';
        $data->variant = 'Puppy - Lamb';
        $data->variant_idn = 'Puppy - Lamb';
        $data->size = '25lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-speciality-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-speciality-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy - Lamb

        // Adult - Lamb
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '4';
        $data->name = 'Eureka Dog';
        $data->name_idn = 'Eureka Dog';
        $data->description = 'Bully Power memiliki palatabilitas yang sangat baik serta padat akan energi untuk memenuhi nutrisi yang dibutuhkan oleh anjing. Diperkaya dengan vitamin dan mineral juga antioksidan yang melindungi tubuh Anjing kesayangan dari bahaya radikal bebas.';
        $data->description_idn = 'Bully Power memiliki palatabilitas yang sangat baik serta padat akan energi untuk memenuhi nutrisi yang dibutuhkan oleh anjing. Diperkaya dengan vitamin dan mineral juga antioksidan yang melindungi tubuh Anjing kesayangan dari bahaya radikal bebas.';
        $data->variant = 'Adult - Lamb';
        $data->variant_idn = 'Adult - Lamb';
        $data->size = '25lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-speciality-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-speciality-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Lamb
        // Bully Power
        // Speciality

        // Grain Free Food
        // Mainsource
        // Puppy - Chicken
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '5';
        $data->name = 'Mainsource';
        $data->name_idn = 'Mainsource';
        $data->description = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->description_idn = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->variant = 'Puppy - Chicken';
        $data->variant_idn = 'Puppy - Chicken';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy - Chicken

        // Adult - Lamb
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '5';
        $data->name = 'Mainsource';
        $data->name_idn = 'Mainsource';
        $data->description = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->description_idn = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->variant = 'Adult - Lamb';
        $data->variant_idn = 'Adult - Lamb';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Lamb

        // Adult - Salmon
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '5';
        $data->name = 'Mainsource';
        $data->name_idn = 'Mainsource';
        $data->description = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->description_idn = 'Mainsource Professional Dog Food diformulasikan secara khusus untuk memenuhi kebutuhan nutrisi anjing yang membutuhkan lebih banyak energi Protein dan lemak tambahan. Untuk anjing pekerja atau anjing yang terpapar cuaca dingin akan berkembang biak dengan nutrisi ini, rasa renyah menarik makanan anjing.';
        $data->variant = 'Adult - Salmon';
        $data->variant_idn = 'Adult - Salmon';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-grain-free-food-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Salmon
        // Mainsource
        // Grain Free Food

        // Special Diet
        // Just Right
        // Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '6';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Just Right adalah Makanan Anjing Super Premium yang diformulasikan untuk memenuhi nutrisinya. Kebutuhan anjing yang biasanya aktif yang akan membantu hewan peliharaan Anda menjalani.';
        $data->description_idn = 'Just Right adalah Makanan Anjing Super Premium yang diformulasikan untuk memenuhi nutrisinya. Kebutuhan anjing yang biasanya aktif yang akan membantu hewan peliharaan Anda menjalani.';
        $data->variant = 'Lamb & Rice';
        $data->variant_idn = 'Lamb & Rice';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-special-diet-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-special-diet-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Lamb & Rice

        // Beef and Potato
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '6';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Just Right adalah Makanan Anjing Super Premium yang diformulasikan untuk memenuhi nutrisinya. Kebutuhan anjing yang biasanya aktif yang akan membantu hewan peliharaan Anda menjalani.';
        $data->description_idn = 'Just Right adalah Makanan Anjing Super Premium yang diformulasikan untuk memenuhi nutrisinya. Kebutuhan anjing yang biasanya aktif yang akan membantu hewan peliharaan Anda menjalani.';
        $data->variant = 'Beef and Potato';
        $data->variant_idn = 'Beef and Potato';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-special-diet-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-special-diet-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Beef and Potato
        // Just Right
        // Special Diet

        // Everyday
        // Country
        // Puppy
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '7';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Puppy';
        $data->variant_idn = 'Puppy';
        $data->size = '2kg';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '7';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Puppy';
        $data->variant_idn = 'Puppy';
        $data->size = '20lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy

        // Beef
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '7';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Beef';
        $data->variant_idn = 'Beef';
        $data->size = '2kg';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '7';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Beef';
        $data->variant_idn = 'Beef';
        $data->size = '20lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Beef
        // Country

        // Prime Choice
        // Puppy - Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '1.8kg';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '20lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Puppy - Lamb & Rice';
        $data->variant_idn = 'Puppy - Lamb & Rice';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Puppy - Lamb & Rice

        // Adult - Beef
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Beef';
        $data->variant_idn = 'Adult - Beef';
        $data->size = '1.8kg';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Beef';
        $data->variant_idn = 'Adult - Beef';
        $data->size = '20lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Beef';
        $data->variant_idn = 'Adult - Beef';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Beef

        // Adult - Lamb & Rice
        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Lamb & Rice';
        $data->variant_idn = 'Adult - Lamb & Rice';
        $data->size = '1.8kg';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Lamb & Rice';
        $data->variant_idn = 'Adult - Lamb & Rice';
        $data->size = '20lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();

        $data = new Product();
        $data->pet_id = '1';
        $data->product_type_id = '1';
        $data->product_category_id = '8';
        $data->name = 'Just Right';
        $data->name_idn = 'Just Right';
        $data->description = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->description_idn = 'Country Dog Food sudah lama dipercaya oleh para pecinta anjing dan breeder di Indonesia. Berbeda dengan makanan anjing lain di kelasnya, Country Dog Food merupakan makanan anjing dengan kualitas permium namun dengan harga sangat terjangkau. Menjadikan Country Dog Food pilihan tepat bagi para pecinta anjing yang tetap ingin memberikan makanan terbaik untuk kesayangannya.';
        $data->variant = 'Adult - Lamb & Rice';
        $data->variant_idn = 'Adult - Lamb & Rice';
        $data->size = '40lbs';
        $data->color = null;
        $data->image = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-').'.png';
        $data->slug = 'dog-dry-food-everyday-'.Str::slug($data->name, '-').'-'.Str::slug($data->variant, '-').'-'.Str::slug($data->size, '-');
        $data->save();
        // Adult - Lamb & Rice
        // Prime Choice
        // Everyday
        // DRY FOOD
        // DOG
    }
}
