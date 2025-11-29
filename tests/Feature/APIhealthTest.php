<?php

namespace Tests\Feature;

use Tests\TestCase;

class APIHealthTest extends TestCase
{
    public function test_health_endpoint_returns_successful_response()
    {
        $response = $this->get('/api/health');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'OK'
        ]);
    }
}
