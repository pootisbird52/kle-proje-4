<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->words(2,true),
            'price' => fake()->numberBetween(1,30000),
            'url' => fake()->url(),
            'logo' => "https://picsum.photos/seed/".(string)(rand(1,5000))."/200",
            'description' => fake()->words(10, $asText = true)
        ];
    }
}
