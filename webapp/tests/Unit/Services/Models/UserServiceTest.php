<?php

namespace App\Services\Models;

use Tests\TestCase;

/**
 * Class UserServiceTest
 * @package App\Services\User
 */
class UserServiceTest extends TestCase
{
    /**
     * Can inject the service
     * @test
     */
    public function canInjectService()
    {
        $injectedService = $this->app->make('App\Services\Models\UserService');
        $this->assertInstanceOf(UserService::class, $injectedService);
    }

}