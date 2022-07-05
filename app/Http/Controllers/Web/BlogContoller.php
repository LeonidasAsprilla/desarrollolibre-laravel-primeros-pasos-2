<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("posted","yes")->paginate(5);
        return view("web.blog.index", compact("posts"));
    }

    
    public function show(Post $post)
    {
        return view("web.blog.show", compact("post"));
    }
}
