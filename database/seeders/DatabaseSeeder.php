<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Semester::factory(3)->create();
//        Blog::factory()->count(20)->create();
//        Admin::factory()->count(10)->create();
//        Student::factory()->count(10)->create();
//        Course::factory()->count(10)->create();
//        Teacher::factory()->count(10)->create();

    }
}
