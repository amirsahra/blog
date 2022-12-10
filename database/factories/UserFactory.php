<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->boolean(); // true for male, false for female
        $province_id = $this->faker->numberBetween(1,31);
        $city_id = Province::find($province_id)->cities()->inRandomOrder()->first();

        return [
            'first_name' => ($gender) ? $this->faker->firstNameMale() : $this->faker->firstNameFemale(),
            'last_name' => $this->faker->name(),
            'nationality_code' => $this->faker->unique()->numerify('##########'),
            'username' => $this->faker->unique()->userName,
            'phone' => $this->faker->unique()->phoneNumber(),
            'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'gender' => ($gender) ? 'male' : 'female',
            'military' => ($gender) ? $this->faker->randomElement(['end', 'exempt']) : null,
            'email' => $this->faker->unique()->safeEmail(),
            'avatar' => '/user.png',
            'province_id' => $province_id,
            'city_id' => $city_id,
            'email_verified_at' => now(),
            'authentication_code' => rand(9999,99999),
            'code_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
