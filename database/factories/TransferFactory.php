<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'origin_id' => $this->faker->numberBetween(1, BankAccount::count()),
            'destination_id' => $this->faker->numberBetween(1, BankAccount::count()),
            'amount' => $this->faker->numberBetween(10000, 200000),
            'status' => $this->faker->randomElement(Transfer::STATUSES),
        ];
    }
}
