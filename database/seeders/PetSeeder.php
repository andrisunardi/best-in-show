<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $data = new Pet();
        $data->name = 'Dog';
        $data->name_idn = 'Anjing';
        $data->image = 'dog.png';
        $data->product_image = 'dog.png';
        $data->youtube = 'dog.png';
        $data->slug = 'dog';
        $data->save();

        $data = new Pet();
        $data->name = 'Cat';
        $data->name_idn = 'Kucing';
        $data->image = 'cat.png';
        $data->product_image = 'cat.png';
        $data->youtube = 'cat.png';
        $data->slug = 'cat';
        $data->save();

        $data = new Pet();
        $data->name = 'Small Animal';
        $data->name_idn = 'Hewan Kecil';
        $data->image = 'small-animal.png';
        $data->product_image = 'small-animal.png';
        $data->youtube = 'small-animal.png';
        $data->slug = 'small-animal';
        $data->save();
    }
}
