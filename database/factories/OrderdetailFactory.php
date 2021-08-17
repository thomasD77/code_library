<?php

namespace Database\Factories;

use App\Models\Orderdetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderdetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orderdetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'price' => $this->faker->randomFloat(1, 0, 500),
            'order_id' => $this->faker->numberBetween(1,10),
            'product_id' => $this->faker->numberBetween(1,40),
        ];
    }
}
