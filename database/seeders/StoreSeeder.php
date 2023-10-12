<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $data = new Store();
        $data->category = '1';
        $data->name = "'16 PETSHOP PURWAKARTA";
        $data->address = "'Jl. Raya Sadang Subang Ruko Puri Pakuan (keluar pintu tol Sadang lurus 200m pinggir jalan provinsi) Subang Jawa Barat Indonesia";
        $data->google_maps_iframe = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1075896885227!2d107.45785615138657!3d-6.508063395269262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690df00a2960f9%3A0xb0861cf1e8839a25!2sJl.%20Raya%20Sadang-Subang%2C%20Kabupaten%20Purwakarta%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1617635020694!5m2!1sid!2sid';
        $data->google_maps = 'https://goo.gl/maps/Z4C1jb6jecEF3YWH6';
        $data->save();

        $data = new Store();
        $data->category = '2';
        $data->name = "'2 D QUEEN PET";
        $data->address = "'Jl. Purba Sari No. 6 Terusan Golf Timur 4  Arcamanik Bandung Bandung Indonesia";
        $data->google_maps_iframe = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1075896885227!2d107.45785615138657!3d-6.508063395269262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690df00a2960f9%3A0xb0861cf1e8839a25!2sJl.%20Raya%20Sadang-Subang%2C%20Kabupaten%20Purwakarta%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1617635020694!5m2!1sid!2sid';
        $data->google_maps = 'https://goo.gl/maps/Z4C1jb6jecEF3YWH6';
        $data->save();
    }
}
