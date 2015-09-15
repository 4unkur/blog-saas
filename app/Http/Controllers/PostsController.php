<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use App;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::where('draft', '=', 0)->paginate(10);

        return view('posts.all')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostFormRequest $request)
    {
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
        $isDraft = (bool)$request->get('save');
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'slug' => $request->get('title'),
            'draft' => $isDraft,
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
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
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
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
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
    public function update(PostFormRequest $request, $id)
    {
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
        $post = Post::findBySlugOrId($id);
        $isDraft = (bool)$request->get('draft');

        $post->update([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'draft' => $isDraft ? 1 : 0,
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
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
        Post::destroy($id);

        return \Redirect::route('posts.index')->with('message', 'Post is deleted');
    }

    public function drafts()
    {
        if (Auth::guest()) {
            App::abort(403, 'Access denied');
        }
        $drafts = Post::where('draft', '=', 1)->paginate(10);

        return view('posts.all')->with('posts', $drafts);
    }
}
