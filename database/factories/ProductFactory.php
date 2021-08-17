<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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

        $name = $this->faker->sentence($nbWords = 2, $variableNbWords = true);
        $slug = Str::slug($name, '-');
        return [
            //
            'name' => $name,
            'body'=> $this->faker->realText(),
            'long_description'=> $this->faker->realText(),
            'tec_sheet'=> $this->faker->realText(),
            'price' => $this->faker->randomFloat(1, 0, 500),
            'brand_id' => $this->faker->numberBetween(1,5),
            'slug'=> $slug,
            'photo_id' => 6
        ];
    }
}
