<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // index - get all
    // show - get by id
    // store - insert into DB
    // update - update in database
    // destroy - delete from database

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // select * from posts where id = $id limit 1;
        // $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        // procitamo i validiramo podatke iz requesta
        // upisemo post u bazu
        // redirektujemo korisnika na single post stranicu

        // insert into posts (title, content) values ($title, $content)
        // $request->get('published', false);
        // $request->all();
        // $request->only(['title', 'content', 'is_published']);

        $data = $request->validated();
        $post = Post::create($data);
        return redirect('/posts/' . $post->id);
    }
}
