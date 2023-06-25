<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; // Optional, if you want to use a fresh database for each test

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // Make a GET request to your API endpoint
        $response = $this->get('/api/endpoint');

        // Assert that the response has a successful status code (200)
        $response->assertStatus(200);

        // Assert that the response has a specific JSON structure or data
        $response->assertJson([
            'key' => 'value',
        ]);

        // Assert that the response contains a specific string
        $response->assertSee('Expected String');

        // You can also assert other things like the response headers, cookies, etc.
        // Check the Laravel documentation for more information on available assertions.
    }
}
