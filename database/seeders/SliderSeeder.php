<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $data = new Slider();
        $data->image = '1.jpg';
        $data->save();

        $data = new Slider();
        $data->image = '2.jpg';
        $data->save();

        $data = new Slider();
        $data->image = '3.jpg';
        $data->save();
    }
}
