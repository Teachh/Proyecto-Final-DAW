<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $draws = Draw::paginate(10);
        // Personas con mas seguidores
        $popularUsers = User::all();
        $popularUsersOrd = [];
        foreach ($popularUsers as $p) {
            $popularUsersOrd[$p->id] = count($p->follows);
        }
        arsort($popularUsersOrd);
        // Administradores
        $admins = User::where('rol','admin')->get();
        // Si es ajax para cambiar los rsultados
        if($request->ajax()){
            // hay una ordenacion
            if(request('order') != null){
                $draws = '';
                switch (request('order')) {
                    case 'vpos':
                        // SELECT d.id, v.vote, count(*) as cnt FROM draws d, votes v WHERE v.draw_id = d.id AND v.vote = "pos" GROUP BY d.id ORDER BY cnt desc
                        $draws = DB::table('draws')
                                ->join('votes','draws.id', '=', 'votes.draw_id')
                                ->select(DB::raw('draws.*, count(*) as cnt'))
                                ->where('votes.vote', '=', 'pos')
                                ->groupBy('votes.draw_id')
                                ->orderBy('cnt','DESC')
                                ->paginate(10);
                        
                        break;
                    case 'vneg':
                        // SELECT d.id, v.vote, count(*) as cnt FROM draws d, votes v WHERE v.draw_id = d.id AND v.vote = "pos" GROUP BY d.id ORDER BY cnt ASC
                        $draws = DB::table('draws')
                                ->join('votes','draws.id', '=', 'votes.draw_id')
                                ->select(DB::raw('draws.*, count(*) as cnt'))
                                ->where('votes.vote', '=', 'neg')
                                ->groupBy('votes.draw_id')
                                ->orderBy('cnt','DESC')
                                ->paginate(10);
                        break;
                    case 'npos':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('title','ASC')->paginate(10);
                        break;
                    case 'nneg':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('title','DESC')->paginate(10);
                        break;
                    case 'npos':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('created_at','DESC')->paginate(10);
                        break;
                    case 'nneg':
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('created_at','ASC')->paginate(10);
                        break;
                    default:
                        $draws = Draw::where('title', 'like', '%'.request('search').'%')->orderBy('created_at','ASC')->paginate(10);
                        break;
                }
                return view('ajax.draws', compact('draws'))->render();
            }
            // sino retorna esto por defecto
            $draws = Draw::where('title', 'like', '%'.request('search').'%')->paginate(10);
            return view('ajax.draws', compact('draws'))->render();
        }
        return view('home', compact('draws', 'popularUsersOrd','admins'));
    }
}
