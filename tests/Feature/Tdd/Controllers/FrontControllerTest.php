<?php

namespace Tests\Feature\Tdd\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FrontControllerTest extends TestCase
{

    public function test_route_index_view_and_controller(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Property Search');
    }
}
