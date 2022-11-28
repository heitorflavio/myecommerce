<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'Fulldescription' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'sku' => $this->faker->randomNumber(8),
            'stock' => $this->faker->randomFloat(2, 1, 100),
            'onSalePrice' => $this->faker->randomFloat(2, 1, 100),
            'onSale' => $this->faker->numberBetween(0, 1),
            'onSaleDate' => $this->faker->dateTime('2022-12-31', 'Europe/Lisbon'),
            
        ];
    }
}
