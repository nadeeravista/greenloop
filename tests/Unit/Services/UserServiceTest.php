<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\UserService;
use Mockery;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class UserServiceTest extends TestCase
{
    public function test_generate_user_qr_code()
    {
        $userService = new UserService();

        $qrCode = $userService->generateUserQRCode('test@example.com');

        $this->assertNotNull($qrCode);
        $this->assertStringStartsWith('<?xml version="1.0"', $qrCode);
    }

    public function test_generate_token()
    {

        $mockPlainTextToken = Mockery::mock();
        $mockPlainTextToken->plainTextToken = 'mocked-token-12345';

        $mockFirstUser = Mockery::mock();
        $mockFirstUser->shouldReceive('createToken')
            ->with('api-token')
            ->once()
            ->andReturn($mockPlainTextToken);


        $mockUser = Mockery::mock(User::class);
        $mockUser->shouldReceive('first')->andReturn($mockFirstUser);

        $this->app->instance(User::class, $mockUser);

        $userService = new UserService();
        $token = $userService->generateToken();

        $this->assertEquals('mocked-token-12345', $token);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
