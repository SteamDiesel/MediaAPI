<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where(['user_id' => Auth::id()])->orderBy('updated_at', 'desc')->get();

        return view('home', ['posts' => $posts]);
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
    public function store(Request $request)
    {
        //
        
        $post = new Post;

        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save();
        $posts = Post::where(['user_id' => Auth::id()])->orderBy('updated_at', 'desc')->get();


        return view('home', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $media = $post->getMedia();

        return view('post.edit', ['post' => $post, 'media' => $media]);
        // return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        // dd($request->all());

        $photo = $request->file('photo');
        if ($photo) {
            $name =  time() . '-' . $photo->getClientOriginalName();
            $photo->move(public_path() . '/images/', $name);
            $post->photo_url = '/images/' . $name;
        }

        request()->validate([
            'title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'body' => 'nullable|string',
        ]);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        $post->save();

        $media = $post->getMedia();

        return view('post.edit', ['post' => $post, 'media' => $media]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function photo(Request $request, Post $post)
    {
        //
        request()->validate([
            'description' => 'nullable|string|max:255'
        ]);
        
        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $name =  time() . '-' . $photo->getClientOriginalName();

            $photo->move(public_path() . '/images/', $name);
            $post
                ->addMedia(public_path() . '/images/' . $name)
                ->withCustomProperties(['description' => $request->description])
                ->toMediaCollection();
        }


        $media = $post->getMedia();

        return view('post.edit', ['post' => $post, 'media' => $media]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
