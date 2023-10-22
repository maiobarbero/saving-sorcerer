<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'category_id' => Category::all()->random(),
            'amount' => fake()->numberBetween(-2000, 2000),
            'description' => fake()->sentence(),
            'date' => fake()->dateTimeBetween('-1 year')
        ];
    }
}