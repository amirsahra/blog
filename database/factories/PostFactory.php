<?php

namespace Database\Factories;

use App\Traits\Studiable;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    use Studiable;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postTitle = $this->faker->unique()->jobTitle();
        $postContent = $this->faker->realTextBetween(500,1000);
        return [
            'title' => $postTitle,
            'slug' => str_replace(' ', '_', $postTitle),
            'content' => $postContent,
            'study_time'=> $this->calculationOfTextReadingTime($postContent),
            'user_id'=> $this->faker->numberBetween(1,100),
            'category_id'=> $this->faker->numberBetween(1,20),
        ];
    }
}
