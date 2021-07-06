<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cate_id' => category::all()->random()->id,
            'price' => rand(1000, 10000000),
            'quantity' => rand(0, 1),
            'status' => rand(0, 1)
        ];
    }
}