<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertDefaultProvince();
    }

    public function insertDefaultProvince()
    {
        $provinceJsonFilePath = public_path() . "/json/province.json";
        $provinces = json_decode(file_get_contents($provinceJsonFilePath));
        foreach ( $provinces as $province){
            Province::create([
                'name'=> $province->name,
                'slug'=> $province->slug,
            ]);
        }
    }
}
