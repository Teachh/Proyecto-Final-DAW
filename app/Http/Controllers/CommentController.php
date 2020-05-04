<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $c = new Comment();
        $c->user_id = auth()->user()->id;
        $c->draw_id = $id;
        $c->text = request('text');
        $c->like = 0;
        $c->dislike = 0;
        $c->save();
        return redirect('dibujo/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Comment::findOrFail($id)->delete();
        return redirect('dibujo/'.$id);
    }
    // Corregir fallo de que no pueda darme 100000 likes o dislikes
    public function like($id){
        $c = Comment::findOrFail($id);
        $c->like = $c->like+1;
        $c->save();
        return redirect('dibujo/'.$c->draw_id);
    }
    public function dislike($id){
        $c = Comment::findOrFail($id);
        $c->dislike = $c->dislike+1;
        $c->save();
        return redirect('dibujo/'.$c->draw_id);
    }
}
