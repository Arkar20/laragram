<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ablum;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Factories\Factory;

class AblumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ablum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->sentence,
            'image' => 'https://tailwindcss.com/img/card-top.jpg',
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
