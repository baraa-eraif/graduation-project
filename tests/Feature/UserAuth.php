<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Student\Providers\RouteServiceProvider;
use Tests\TestCase;

class UserAuth extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function studentLogin()
    {

        $response = $this->post('student/login', [
            'student_id' => '12023965786',
            'password' => '123456',
        ]);

        $this->assertAuthenticated(STUDENTS_GUARD);
        $response->assertRedirect(route('student.dashboard.index'));
    }

    public function adminLogin()
    {

        $response = $this->post('admin/login', [
            'email' => 'klocko.ines@example.org',
            'password' => '123456',
        ]);

        $this->assertAuthenticated(ADMINS_GUARD);
        $response->assertRedirect(route('admin.dashboard.index'));
    }

    public function teacherLogin()
    {

        $response = $this->post('teacher/login', [
            'teacher_id' => '974996809',
            'password' => '123456',
        ]);

        $this->assertAuthenticated(ADMINS_GUARD);
        $response->assertRedirect(route('teacher.dashboard.index'));
    }
}
