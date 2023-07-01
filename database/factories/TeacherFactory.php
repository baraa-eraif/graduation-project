<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => $this->faker->unique()->numberBetween(100000000, 999999999), // Generate a 9-digit number
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('123456'), // Set a default password (can be changed later)
            'name' => $this->faker->name,
            'specialization' => $this->faker->word,
            'profile_image' => 'assets/media/avatars/blank.png',
        ];
    }
}
