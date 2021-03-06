<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'password' => '123456',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify('0#########'),
            'active' => rand(0, 1)
        ];
    }
}