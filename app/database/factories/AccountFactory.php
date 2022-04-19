<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'password' => $this->faker->password,
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'role' => $this->faker->randomNumber(1, 2),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
