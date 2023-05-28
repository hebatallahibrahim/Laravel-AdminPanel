<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        if(Auth::user()->role == '1' ){


            $posts = Post::orderBy('id', 'desc')->get();
          return view('admin.posts.index', ['posts' => $posts]);
    }
else {
    $user_id= Auth::user()->id ;

    $posts = Post::where('userId',$user_id)->get();



    return view('nUser.posts.index', ['posts' => $posts]);

}
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('admin.posts.create',['users'=>$users]);
    }


    public function store(Request $request)
    {
        //validate the field
       
        $data = request()->validate([
            'title' => 'required|max:255',



        ]);



        // $user = auth()->user();
        $post = new Post();

        $post->title = request('title');

        $post->userId = request('role');

        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {


        return view('nUser.posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {


        //get the post with the id $post->idate
        $post = Post::find($post->id);

        // return view
        return view('nUser/posts/edit', ['post' => $post]);
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



        //validate the field
        $data = request()->validate([
            'title' => 'required|max:255',


        ]);


        $post = Post::findOrFail($post->id);

        $post->title = request('title');


        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {

        //find the post
        $post = Post::find($request->post_id);




             $post->delete();

        //redirect to posts
        return redirect('/posts');
    }
}
