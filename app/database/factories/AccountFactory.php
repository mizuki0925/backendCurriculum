<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
use DateTime;
use DateTimeZone;

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
        // $jpTime = new DateTime();
        // $jpTime->setTimeZone(new DateTimeZone('Asia/Tokyo'));
        return [
            'name' => $this->faker->name,
            'password' => $this->faker->password,
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'role' => $this->faker->numberBetween(1, 2),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
