<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cityJsonFilePath = public_path() . "/json/city.json";
        $cities = json_decode(file_get_contents($cityJsonFilePath));
        foreach ( $cities as $city){
            City::create([
                'name'=> $city->name,
                'slug'=> $city->slug,
                'province_id'=> $city->province_id,
            ]);
        }
    }
}
