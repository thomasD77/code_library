<?php

namespace Database\Factories;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductColor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colors = ProductColor::pluck('id')->toArray();
        return [
            //
            'product_id' => $this->faker->numberBetween(1,40),
            'product_color_id' => $this->faker->randomElement($colors)
        ];
    }
}
