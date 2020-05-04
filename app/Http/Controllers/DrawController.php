<?php

namespace App\Http\Controllers;

use App\Draw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('draw.index');
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'draw' => 'required|image',
            'image' => 'required|image',
        ]);
        if ($validator->fails()) {
            $messageError = "No has introducido bien las imágenes!";
            return view('draw.index', compact('messageError'));
        }
        else{
            // Conseguir las dos imagenes
            $draw = '';
            $image = '';
            if($request->draw != null ){
                request()->validate([
                    'draw' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.request()->draw->getClientOriginalExtension();
                request()->draw->move(public_path('img/draws/draw'), $imageName);
                
                $ruta = public_path('img/draws/draw') . "/" . $imageName;
        
        
                // Acabar de cambiar la imagen
                $draw = 'img/draws/draw/'.$imageName;
    
            }
            if($request->image != null ){
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('img/draws/image'), $imageName);
                
                $ruta = public_path('img/draws/image') . "/" . $imageName;
        
        
                // Acabar de cambiar la imagen
                $image = 'img/draws/image/'.$imageName;
                
            }
        }
        // Hacer el insert
        $d = new Draw();
        $d->title = request('title');
        $d->description = request('description');
        $d->draw = $draw;
        $d->image = $image;
        $d->save();
        return view('draw.created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Draw  $draw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Accediento al dibujo";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Draw  $draw
     * @return \Illuminate\Http\Response
     */
    public function edit(Draw $draw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Draw  $draw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Draw $draw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Draw  $draw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draw $draw)
    {
        //
    }

    /**
     * Mis funciones
     */
    public function freeDraw()
    {
        return view('draw.freeDraw');
    }
}
