<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    private static $counter = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catName = $this->faker->unique()->jobTitle();
        $parent_id = null;
        if (self::$counter > 5)
            $parent_id = $this->faker->numberBetween(1, 4);
        self::$counter++;

        return [
            'name' => $catName,
            'slug' => str_replace(' ', '_', $catName),
            'parent_id'=>$parent_id,
        ];
    }
}
