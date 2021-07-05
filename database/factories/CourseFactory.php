<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->sentence(),
            'active'    => $this->faker->boolean(),
            'description'   => $this->faker->text(600),
            'rating'        => $this->faker->numberBetween(0,5),
            'views'         => $this->faker->randomDigit(),
            'levels'        => $this->faker->randomElement(['beginner', 'immediate', 'high']),
            'hours'       => $this->faker->numberBetween(10, 50),
            'category_id'   => $this->faker->numberBetween(1,10),


        ];
    }
}
