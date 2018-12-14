<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesAvailableTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

}
