<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    
    public function test_client_page_is_loaded()
    {
        $response = $this->get('/clients');

        $response->assertStatus(200);
    }
    
        public function test_client_creation_page_is_loaded()
    {
        $response = $this->get('/clients/create');

        $response->assertStatus(200);
    }

}
