<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Draw;
use App\User;
use App\Vote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $draws = Draw::all();
        // Personas con mas seguidores
        $popularUsers = User::all();
        $popularUsersOrd = [];
        foreach ($popularUsers as $p) {
            $popularUsersOrd[$p->id] = count($p->follows);
        }
        arsort($popularUsersOrd);
        // Si es ajax para cambiar los rsultados
        if($request->ajax()){
            // hay una ordenacion
            if(request('order') != null){
                switch (request('order')) {
                    case 'vpos':
                        // SELECT d.id, v.vote, count(*) FROM draws d, votes v WHERE v.draw_id = d.id AND v.vote = "pos" GROUP BY d.id;
                        break;
                    case 'vneg':
                        // SELECT d.id, v.vote, count(*) FROM draws d, votes v WHERE v.draw_id = d.id AND v.vote = "neg" GROUP BY d.id;
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('','')->get();
                        break;
                    case 'spos':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('','')->get();
                        break;
                    case 'sneg':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('','')->get();
                        break;
                    case 'npos':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('created_at','DESC')->get();
                        break;
                    case 'nneg':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('created_at','ASC')->get();
                        break;
                    default:
                        # code...
                        break;
                }
                return view('ajax.draws', compact('draws'))->render();
            }
            // sino retorna esto por defecto
            $draws = Draw::where('title', 'like', '%'.request('search').'%')->get();
            return view('ajax.draws', compact('draws'))->render();
        }
        return view('home', compact('draws', 'popularUsersOrd'));
    }
}
