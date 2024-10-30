<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    protected $model = Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name('id_ID'),
            'telephone' => '08' . $this->faker->numberBetween(10000000, 99999999),
            'alamat' => $this->faker->streetAddress . ', ' . $this->faker->city . ', ' . $this->faker->state,
            'shift' => $this->faker->numberBetween(1, 2)
        ];
    }
    
}