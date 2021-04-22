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
        $userList = $this->userService->getAllUser();
        return response()->json(['data'=>$userList,],200);

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
        $user= $this->userService->store($request);
        return response()->json(['data'=>$user],201);
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
        $user = $this->userService->update($request, $id);
        return response()->json(['data'=>$user],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = $this->userService->delete($id);
         return response()->json(['data'=>$user],200);
    }
    /**
     * Get the user has the most blogs
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserHasMostBlogs()
    {
        $user = $this->userService->getUserHasMostBlogs();
        return response()->json(['data'=>$user],200);
    }

    /**
     * Get the user has the most blogs
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserHasLeastBlogs()
    {
        $user = $this->userService->getUserHasLeastBlogs();
        return response()->json(['data'=>$user],200);
    }

}
