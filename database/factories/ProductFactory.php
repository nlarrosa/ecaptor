<?php

namespace Database\Factories;

use App\Models\Line;
use App\Models\Product;
use App\Models\TypeProduct;
use Database\Seeders\TypeProductSeeder;
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
            'name' => $this->faker->text(20),
            'width' => $this->faker->numberBetween(60, 250),
            'height' => $this->faker->numberBetween(60, 250),
            'price' => $this->faker->randomFloat(2, 40, 99),
            'details' => $this->faker->sentence(15),
            'stock' => true,
            'line_id' => Line::all()->random()->id,
            'type_product_id' => TypeProduct::all()->random()->id,
        ];
    }
}
