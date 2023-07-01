<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => '12023' . $this->faker->unique()->numberBetween(100000, 999999), // Generate a 9-digit number prefixed with '12023'
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123456'), // Set a default password (can be changed later)
            'name' => $this->faker->name,
            'specialization_id' => 1, // Adjust the range based on your specialization IDs
            'balance' => 0,
            'gpa' => 0,
            'profile_image' => 'assets/media/avatars/blank.png',
            'passed_hours' => 0,
            'enrolled_hours' => 0,
        ];
    }
}
