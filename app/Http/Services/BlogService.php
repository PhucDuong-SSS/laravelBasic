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
        $blogs =  $this->blogModel->all();
        return $blogs;
    }

    public function store($request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = $request->user_id;
        $blog->save();
        return $blog;
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
        return $blog;
    }

    public function delete($id)
    {
        $blog = $this->blogModel->findOrFail($id);
        $blog->delete();
        return $blog;
    }
}


