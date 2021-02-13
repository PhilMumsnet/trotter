<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Trott;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrottFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trott::class;

    /**
     * Define the model's default state.
     *
     */
    public function definition(): array
    {
        return [
            'user_id' => User::Factory(),
            'body' => $this->faker->sentence(),
        ];
    }
}
