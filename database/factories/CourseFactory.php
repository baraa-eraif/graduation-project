<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Semester;
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
            'course_ident' => $this->faker->unique()->word,
            'name' => $this->faker->sentence,
            'hour_number' => $this->faker->numberBetween(1, 4), // Set the maximum value to 4
            'other_details' => $this->faker->paragraph,
            'study_year' => $this->faker->randomElement([1,2,3,4]),
            'study_season' => $this->faker->randomElement([1,2]),
            'course_type' => $this->faker->randomElement(['university_requirement', 'specialty']),
            'semester_id' => function () {
                return Semester::factory()->create()->id;
            }
        ];
    }
}
