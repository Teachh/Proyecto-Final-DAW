<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Draw;
use App\User;

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
    public function index()
    {
        $draws = Draw::all();
        // Personas con mas seguidores
        $popularUsers = User::all();
        $popularUsersOrd = [];
        foreach ($popularUsers as $p) {
            $popularUsersOrd[$p->id] = count($p->follows);
        }
        arsort($popularUsersOrd);

        return view('home', compact('draws', 'popularUsersOrd'));
    }
}
