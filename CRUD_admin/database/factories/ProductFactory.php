<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'cate_id' => Category::all()->random()->id,
            'name' => $this->faker->name(),
            'image' => 'image.jpg',
            'price' => rand(0, 10000000),
            'detail' => $this->faker->text(),
            'sale' => rand(0, 50)
        ];
    }
}