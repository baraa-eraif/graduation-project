<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semester::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['الفصل الثاني', 'الفصل الاول', 'الفصل الصيفي']),
            'number_of_hour' => $this->faker->randomNumber(2),
            'study_plan_id' => $this->faker->numberBetween(1, 10), // Adjust the range based on your study plan IDs
            'year' => $this->faker->randomElement([1, 2]),
            'ordered' => $this->faker->randomElement([1, 2, 3]),
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
