<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('vueApp');
    }

    public function index()
    {
        $posts=  Post::orderby('id', 'DESC')->get();
        $posts = json_decode(json_encode($posts));
        return $posts;
        // return view('vueApp')->with(compact('posts'));
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
        $this->postValid();
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = Auth::user()->id;
        $post->save();
        return response()->json([
            'status'=>true,
            'success'=> 'New post created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id',$id)->first();
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->postValid();
        Post::where('id',$id)->update(['title'=>$request->title, 'body'=>$request->body,'author_id'=>Auth::user()->id]);
        return response()->json([
            'success'=> 'Updated Successfully']);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        if(Auth::check()){
            Post::where('id',$id)->delete();
            return response()->json([
                    'success'=> 'Deleted Successfully']);
        }
        
    }

    protected function postValid()
    {
        request()->validate([
            'title'=>'required|max:255',
            'body'=>'required']);
    }
}
