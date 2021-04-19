<?php
namespace App\Http\Services;

use App\Models\Blog;

class BlogService
{
    protected $blogModel;
    public function __construct(Blog $blogModel)
    {
        $this->blogModel = $blogModel;
    }

    public function getAllBlog()
    {
        $userBlog =  $this->blogModel->all();
        return response()->json(['data'=>$userBlog,],200);
    }

    public function store($request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = $request->user_id;
        $blog->save();
        return response()->json(['data'=>$blog],201);
    }

    public function update($request, $id)
    {
        $blog = $this->blogModel->findOrFail($id);
        if($request->has('title')){
            $blog->title = $request->title;
        }

        if($request->has('content')){
            $blog->content = $request->content;
        }
        if($request->has('user_id')){
            $blog->user_id = $request->user_id;
        }
        $blog->save();
        return response()->json(['data'=>$blog],200);
    }

    public function delete($id)
    {
        $blog = $this->blogModel->findOrFail($id);
        $blog->delete();
        return response()->json(['data'=>$blog],200);
    }
}


