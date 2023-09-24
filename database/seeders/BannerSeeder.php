<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $data = new Banner();
        $data->pet_id = 1;
        $data->image = 'dog-1.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 1;
        $data->image = 'dog-2.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 1;
        $data->image = 'dog-3.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 1;
        $data->image = 'dog-4.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 2;
        $data->image = 'cat-1.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 2;
        $data->image = 'cat-2.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 2;
        $data->image = 'cat-3.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 2;
        $data->image = 'cat-4.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 3;
        $data->image = 'small-animal-1.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 3;
        $data->image = 'small-animal-2.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 3;
        $data->image = 'small-animal-3.png';
        $data->save();

        $data = new Banner();
        $data->pet_id = 3;
        $data->image = 'small-animal-4.png';
        $data->save();
    }
}
