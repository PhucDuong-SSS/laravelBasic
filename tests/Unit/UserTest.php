<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Models\User;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;
use App\Http\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;



class UserTest extends TestCase
{

    public function testGetAllUsers()
    {
        $users = User::all();
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($users) {
            $mock->shouldReceive('getAllUser')->andReturn($users);
        });

        $userController = new UserController($mock);
        $actual = $userController->index();
        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),200);
    }

    public function testDeletelUsers()
    {
        $user= User::findOrFail(1);
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($user) {
            $mock->shouldReceive('delete')->andReturn($user);
        });

        $userController = new UserController($mock);

        $actual = $userController->destroy(1);

        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),200);
    }

    public function testStoreUsers()
    {
        $user= [];
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($user) {
            $mock->shouldReceive('store')->andReturn($user);
        });
        $userController = new UserController($mock);
        $request = new  \App\Http\Requests\UserCreateRequest;
        $request->user_name = 'Phuc';
        $request->email = 'f23423@gmail.com';
        $actual = $userController->store($request);
        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),201);
    }
    public function testUpdateUsers()
    {
        $user= User::findOrFail(1);
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($user) {
            $mock->shouldReceive('update')->andReturn($user);
        });
        $userController = new UserController($mock);
        $request = new  \App\Http\Requests\UserUpdateRequest;
        $request->user_name = 'Phuc';
        $request->email = '1@gmail.com';
        $actual = $userController->update($request,1);
        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),200);
    }
    public function testGetUserHasMostBlogs()
    {
        $user= User::findOrFail(1);
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($user) {
            $mock->shouldReceive('getUserHasMostBlogs')->andReturn($user);
        });
        $userController = new UserController($mock);
        $actual = $userController->getUserHasMostBlogs();
        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),200);
    }
    public function testGetUserHasLeastBlogs()
    {
        $user= User::findOrFail(1);
        $mock = $this->partialMock(UserService::class, function (MockInterface $mock) use($user) {
            $mock->shouldReceive('getUserHasLeastBlogs')->andReturn($user);
        });
        $userController = new UserController($mock);
        $actual = $userController->getUserHasLeastBlogs();
        $this->assertInstanceOf(JsonResponse::class, $actual);
        $this->assertEquals($actual->getStatusCode(),200);
    }
}
