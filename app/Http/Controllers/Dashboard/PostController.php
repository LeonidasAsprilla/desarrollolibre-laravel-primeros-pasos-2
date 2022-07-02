<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::get();
        // dd($categories[1]->title);

        $categories = Category::pluck('id', 'title');
        // dd($categories);

        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // dd($request);
        // dd(request());
        // dd(request("title"));
        // echo request("title");
        // echo $request->input('title');
        // echo $request->title; // también funciona
        // echo $request->input('slug');
        // dd($request->all());

        // $data = array_merge($request->all(), ['image' => '']);
        // Post::create($data);

        // $validated = $request->validate([
        //   "title" => "required|min:5|max:500",
        //   "slug" => "required|min:5|max:500",
        //   "content" => "required|min:7",
        //   "category_id" => "required|integer",
        //   "description" => "required|min:7|max:500",
        //   "posted" => "required"
        // ]);

        // $validated = $request->validate(StoreRequest::myRules());
        // dd($validated);

        // $validator = Validator::make($request->all(), StoreRequest::myRules());
        // dd($validator);
        // dd($validator->fails()); // falló? true o false
        // dd($validator->errors()); 

        Post::create($request->all());
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
