<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LecturerControllerTest extends TestCase
{

    public function test_lecturer_controller_with_not_auth()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
