<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertDefaultAdmin();
    }

    public function insertDefaultAdmin()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'ADMIN',
            'username' => 'admin',
            'nationality_code' => '1234567891',
            'phone' => '09383448367',
            'birthday' => Carbon::make('1996'),
            'gender' => 'male',
            'email' => 'amirhosein.sahra@gmail.com',
            'password' => Hash::make('123456789'),
            'province_id' => 27,
            'city_id' => 849,
        ]);

    }

}
