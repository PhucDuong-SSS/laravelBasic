<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Mockery;
use App\Http\Services\UserService;
use Illuminate\Http\Response;



class UserTest extends TestCase
{

    public function testGetAllUsers()
    {
        $userService = Mockery::mock(UserService::class);
        $user= new UserController($userService);
        $userService->shouldReceive('getAllUser')
            ->andReturn([]);
        $actual = $user->index();

        $this->assertSame([], $actual);
    }

    public function testDeletelUsers()
    {
        $userService = Mockery::mock(UserService::class);
        $user= new UserController($userService);
        $userService->shouldReceive('destroy')
            ->withArgs([100])
            ->andReturn([]);
        $actual = $user->destroy(1);

        $this->assertSame([], $actual);
    }

}
