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
        $userService->shouldReceive('delete')
            ->withArgs([1])
            ->andReturn(true);
        $actual = $user->destroy(1);

        $this->assertEquals(true, $actual);
    }

    public function testStoreUsers()
    {
        $userService = Mockery::mock(UserService::class);
        $user= new UserController($userService);
        $userService->shouldReceive('store')
            ->andReturn(true);
        $actual = $userService->store(['user_name'=>'phuc','email'=>'phuc@gmail.com']);

        $this->assertEquals(true, $actual);
    }
    public function testUpdateUsers()
    {
        $userService = Mockery::mock(UserService::class);

        $userService->shouldReceive('update')
            ->andReturn(true);
        $user= new UserController($userService);
        $actual = $userService->update(['user_name'=>'phuc','email'=>'phuc@gmail.com'],1);

        $this->assertEquals(true, $actual);
    }
    public function testGetUserHasMostBlogs()
    {
        $userService = Mockery::mock(UserService::class);

        $userService->shouldReceive('getUserHasMostBlogs')
            ->andReturn(true);
        $user= new UserController($userService);
        $actual = $user->getUserHasMostBlogs();

        $this->assertEquals(true, $actual);
    }
    public function testGetUserHasLeastBlogs()
    {
        $userService = Mockery::mock(UserService::class);

        $userService->shouldReceive('getUserHasLeastBlogs')
            ->andReturn(true);
        $user= new UserController($userService);
        $actual = $user->getUserHasLeastBlogs();

        $this->assertEquals(true, $actual);
    }


}
