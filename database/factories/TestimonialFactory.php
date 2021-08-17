<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $photo = [
            "people1.PNG", "people2.PNG", "people3.PNG",
            "people4.PNG", "people5.PNG", "people6.PNG",
            "people7.PNG", "people8.PNG", "people9.PNG",
            "people10.PNG", "people11.PNG", "people12.PNG",
            ];
        return [
            //
            'name' => $this->faker->name(),
            'message' => $this->faker->realText(),
            'photo' => $this->faker->randomElement($photo)
        ];
    }
}
