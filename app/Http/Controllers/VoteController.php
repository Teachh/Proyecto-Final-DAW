<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }

    // MIS FUNCIONES
    public function like($id){
        // Borrar si existia un voto antes
        $del = Vote::where('user_id',auth()->user()->id)->where('draw_id',$id)->delete();
        $v = new Vote();
        $v->user_id = auth()->user()->id;
        $v->draw_id = $id;
        $v->vote = 'pos';
        $v->save();
        return redirect('/dibujo/'.$id);
    }
    public function dislike($id){
        // Borrar si existia un voto antes
        $del = Vote::where('user_id',auth()->user()->id)->where('draw_id',$id)->delete();
        $v = new Vote();
        $v->user_id = auth()->user()->id;
        $v->draw_id = $id;
        $v->vote = 'neg';
        $v->save();
        return redirect('/dibujo/'.$id);
    }
}
