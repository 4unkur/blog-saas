<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.all')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'slug' => $request->get('title'),
        ]);

        $post->save();
        return \Redirect::route('posts.show', $post->slug)->with('message', 'Post added!'); //add messages' displaying!
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findBySlug($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findBySlugOrId($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findBySlugOrId($id);

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
        ]);

        return \Redirect::route('posts.show', $post->slug)->with('message', 'Post updated!'); //add messages' displaying!
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return \Redirect::route('posts.index')->with('message', 'Post is deleted');
    }
}
