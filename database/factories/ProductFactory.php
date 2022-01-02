<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'company_id' => $this->faker->randomDigitNotNull(),
        'product_name' => $this->faker->word(),
        'price' => $this->faker->numberBetween($min = 100, $max = 1000),
        'stock' => $this->faker->randomDigit(),
        'comment' => $this->faker->text(),
        'image' => $this->faker->randomLetter(),
        ];
    }
}
