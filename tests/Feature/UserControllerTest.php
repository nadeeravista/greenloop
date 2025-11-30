<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\Models\User;
use Illuminate\Http\Request;

class UserControllerTest extends TestCase
{

    public function test_auth_test_endpoint()
    {

        $request = Mockery::mock(Request::class);
        $request->shouldReceive('user')->andReturn(new User([
            'name' => 'Test User',
            'id' => 1,
            'email' => 'test@example.com'
        ]));

        // Bind the mock to Laravel's container
        $this->app->instance(Request::class, $request);

        $response = $this->withoutMiddleware()->get('/api/auth');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Authenticated'
        ]);
    }

    public function test_generate_user_qr_code_endpoint_returns_successful_response()
    {

        $request = Mockery::mock(Request::class);
        $request->shouldReceive('user')->andReturn(new User([
            'name' => 'Test User',
            'id' => 1,
            'email' => 'test@example.com'
        ]));

        // Bind the mock to Laravel's container
        $this->app->instance(Request::class, $request);

        $response = $this->withoutMiddleware()->get('/api/auth/generate-user-qr-code');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'QR Code generated'
        ]);
        $response->assertJsonStructure([
            'content'
        ]);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
