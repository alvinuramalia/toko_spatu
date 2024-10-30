<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = Produk::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produk' => $this->faker->randomElement(['Nike', 'Adidas', 'Puma', 'Reebok', 'New Era']) . ' ' . $this->faker->word,
            'harga' => $this->faker->numberBetween(100000, 1000000),
        ];
        
    }
}
