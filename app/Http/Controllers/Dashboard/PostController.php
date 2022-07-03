<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
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
        // return route("post.create"); // devuelve la ruta general del nombre
        // return redirect("post/create"); // redirige a la ruta indicada
        // return redirect()->route("post.create"); // redirige a la ruta con nombre indicada
        // return to_route("post.create"); // nuevo en lrvl9 redirige a la ruta con nombre indicada
        

        // $posts = Post::get();
        $posts = Post::paginate(5);
        return view('dashboard.post.index', compact('posts'));
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
        $post = new Post();

        return view('dashboard.post.create', compact('categories', 'post'));
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

        // $data = $request->validated();

        // $data['slug'] = Str::of($data['title'])->slug('-');
        // $data['slug'] = Str::slug($data['title']);
        // dd($data);

        // Post::create($request->all());
        // dd($request->all());

        Post::create($request->validated());
        return to_route("post.index")->with('status', 'Registro creado.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');

        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        // dd($request->validated());
        $data = $request->validated();
        if (isset($data["image"])) {
            // dd($request->image);
            // dd($request->validated()["image"]->getClientOriginalName());
            $data["image"] = $filename = time().".".$data["image"]->extension();
            // dd($filename);
            $request->image->move(public_path("image"),$filename);
        }

        // $post->update($request->validated());
        $post->update($data);
        // $request->session()->flash('status', 'Registro actualizado');
        return to_route("post.index")->with('status', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // echo "Destroy";
        $post->delete();
        return to_route("post.index")->with('status', 'Registro eliminado!');
    }
}
