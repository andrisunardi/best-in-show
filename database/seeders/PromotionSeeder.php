<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $data = new Promotion();
        $data->name = 'April Special Deals For Breeders Good Dog';
        $data->name_idn = 'April Special Deals For Breeders Good Dog';
        $data->description = 'April Special Deals For Breeders Good Dog';
        $data->description_idn = 'April Special Deals For Breeders Good Dog';
        $data->date = '2021-04-01';
        $data->image = 'april-special-deals-for-breeders-good-dog.jpeg';
        $data->slug = 'april-special-deals-for-breeders-good-dog';
        $data->save();

        $data = new Promotion();
        $data->name = 'April Special Deals For Breeders Prime Choice';
        $data->name_idn = 'April Special Deals For Breeders Prime Choice';
        $data->description = 'April Special Deals For Breeders Prime Choice';
        $data->description_idn = 'April Special Deals For Breeders Prime Choice';
        $data->date = '2021-04-01';
        $data->image = 'april-special-deals-for-breeders-prime-choice.jpeg';
        $data->slug = 'april-special-deals-for-breeders-prime-choice';
        $data->save();

        $data = new Promotion();
        $data->name = 'April Special Deals For Breeders Essential';
        $data->name_idn = 'April Special Deals For Breeders Essential';
        $data->description = 'April Special Deals For Breeders Essential';
        $data->description_idn = 'April Special Deals For Breeders Essential';
        $data->date = '2021-04-01';
        $data->image = 'april-special-deals-for-breeders-essential.jpeg';
        $data->slug = 'april-special-deals-for-breeders-essential';
        $data->save();

        $data = new Promotion();
        $data->name = 'April Special Deals For Breeders Professional';
        $data->name_idn = 'April Special Deals For Breeders Professional';
        $data->description = 'April Special Deals For Breeders Professional';
        $data->description_idn = 'April Special Deals For Breeders Professional';
        $data->date = '2021-04-01';
        $data->image = 'april-special-deals-for-breeders-professional.jpeg';
        $data->slug = 'april-special-deals-for-breeders-professional';
        $data->save();
    }
}
