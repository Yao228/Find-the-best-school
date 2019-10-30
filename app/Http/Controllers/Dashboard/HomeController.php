<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Ville;
use App\School;
use App\Quartier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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
        $query = School::with('user');
        
        if(!Auth::user()->isAdmin()){
             $query=$query->where('user_id', Auth::user()->id);
         }

       $schools = $query->orderby('id', 'desc')->get();

      

        return view('dashboard.index')
        ->with('users', User::all())
        ->with('schools', $schools)
        ->with('villes', Ville::all())
        ->with('quartiers', Quartier::all());
    }

    /* public function userinfo(){

       $ecoles = DB::table('schools')
        ->where('users', 'users.id', '=', 'schools.user_id')
        ->get();
        $user = DB::table('schools')->where('user_id', 'John')->first();


        print_r($ecoles); 

    } */
}
