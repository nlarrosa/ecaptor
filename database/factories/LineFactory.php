<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Line;
use Illuminate\Database\Eloquent\Factories\Factory;

class LineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Line::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(25),
            'details' => $this->faker->text(100),
            'category_id' => Category::all()->random()->id,
            'image_line' => $this->faker->image()
        ];
    }
}
