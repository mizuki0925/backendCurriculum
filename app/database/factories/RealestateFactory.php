<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Realestate;
use App\Models\Account;
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Realestate>
 */
class RealestateFactory extends Factory
{
    protected $model = Realestate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $floor_plan = ["1R", "1K", "1DK", "1LDK", "2K", "2DK", "2LDK", "3DK", "3LDK", "4DK", "4LDK"];

        return [
            'name' => $this->faker->streetName,
            'adress' => $this->faker->address,
            'breadth' => $this->faker->numberBetween(10, 50),
            'floor_plan' => $floor_plan[rand(0, 10)],
            'tenancy_status' => $this->faker->numberBetween(1, 3),
            'user_id' => Account::factory(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
