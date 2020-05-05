<?php

namespace App\Http\Controllers;

use App\User;
use App\Follow;
use App\Draw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $follow = Follow::where('user_id', $user->id)->count();
        $following = Follow::where('user_id_request', $user->id)->count();
        return view('profile.index', compact('user', 'follow', 'following'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $follow = Follow::where('user_id', $user->id)->count();
        $following = Follow::where('user_id_request', $user->id)->count();
        return view('profile.index', compact('user', 'follow', 'following'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, User $user)
    {    
        $user = auth()->user();
        
        $user->update($request->all());
        if($request->profile_picture != null ){
            request()->validate([
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->profile_picture->getClientOriginalExtension();
            request()->profile_picture->move(public_path('profileImages'), $imageName);
            
            $ruta = public_path('profileImages') . "/" . $imageName;
    
    
            // Acabar de cambiar la imagen
            $user->profile_picture = 'profileImages/'.$imageName;
            $user->save();

        }
        if($request->background != null){
            request()->validate([
                'background' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->background->getClientOriginalExtension();
            request()->background->move(public_path('backgrounds'), $imageName);
            
            $ruta = public_path('backgrounds') . "/" . $imageName;
    
    
            // Acabar de cambiar la imagen
            $user->background = 'backgrounds/'.$imageName;
            $user->save();

        }

    
        


        return redirect('/perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * FUNCIONES MIAS
     */
    public function getFollowers($id){
        $followers = Follow::where('user_id', $id)->get();
        $usuario = User::findOrFail($id)->first();
        return view('profile.followers', compact('followers', 'usuario'));
    }
    public function getFollows($id){
        $followers = Follow::where('user_id_request', $id)->get();
        $usuario = User::findOrFail($id)->first();
        return view('profile.follows', compact('followers', 'usuario'));
    }
    public function showDraws($id){
        $draws = Draw::where('user_id', $id)->get();
        $usuario = User::findOrFail($id)->first();
        return view('profile.draws', compact('draws', 'usuario'));
    }
}