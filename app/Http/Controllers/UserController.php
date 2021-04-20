<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userService->getAllUser();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        return $this->userService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return $this->userService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->userService->delete($id);
    }
    /**
     * Get the user has the most blogs
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserHasMostBlogs()
    {
        return $this->userService->getUserHasMostBlogs();
    }

    /**
     * Get the user has the most blogs
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserHasLeastBlogs()
    {
        return $this->userService->getUserHasLeastBlogs();
    }

}
