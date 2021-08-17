<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'street' => $this->faker->word(),
            'number' => $this->faker->numberBetween(1,100),
            'postbox' => $this->faker->randomNumber(4),
            'city' => $this->faker->word(),
            'country' => $this->faker->word(),
        ];
    }
}
