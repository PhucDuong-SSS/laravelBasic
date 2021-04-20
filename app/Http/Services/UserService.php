<?php
namespace App\Http\Services;

use App\Models\User;

class UserService
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllUser()
    {
        $userList =  $this->userModel->all();
        return response()->json(['data'=>$userList,],200);
    }

    public function store($request)
    {
       $user = new User();
       $user->user_name = $request->user_name;
       $user->email = $request->email;
       $user->save();
       return response()->json(['data'=>$user],201);
    }

    public function update($request, $id)
    {
        $user = $this->userModel->findOrFail($id);
        if($request->has('user_name')){
            $user->user_name = $request->user_name;
        }

        if($request->has('email')){
        $user->email = $request->email;
    }
        $user->save();
        return response()->json(['data'=>$user],200);
    }

    public function delete($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();
        return response()->json(['data'=>$user],200);
    }

    public function getUserHasMostBlogs()
    {
       return $user = User::withCount('blogs')->orderBy('blogs_count','desc')->first();
    }

    public function getUserHasLeastBlogs()
    {
        return $user = User::withCount('blogs')->orderBy('blogs_count','asc')->first();
    }
}


