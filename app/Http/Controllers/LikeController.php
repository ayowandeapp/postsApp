<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id,$user_id)
    {
        $like = new Like;
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->save();
        // Like::create([
        //     'user_id' => '1',
        //     'post_id' => $post_id,
        // ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'like'=> 'required']);
        //if post exist in post table
        $post = Post::where('id',$id)->first();
        if(!$post){
            return response()->json([
                'message'=>'posts does not exist']);
        }
        $user_id = Auth::user()->id;
        $like = Like::where(['post_id'=>$id, 'user_id'=>$user_id]); 
        //or use the ip address of guest
        if ($like->count() == 0) {
            $this->create($id,$user_id);
        }
        $like->update(['like'=>$request->like]);
        return response()->json([
            'message'=>'updated',
            'data'=>$like ->first()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
