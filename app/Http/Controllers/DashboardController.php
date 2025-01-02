<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Mariage;
use App\Models\Naissance;
use App\Models\Divorce;
use App\Models\Dece;
use App\Models\Jugement;
use App\Models\Citoyen;
use App\Models\User;

class DashboardController extends Controller
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
        $mariages = Mariage::all();
        $naissances = Naissance::all();
        $divorces = Divorce::all();
        $deces = Dece::all();
        $jugements = Jugement::all();
        $citoyens = User::all();
        $users = User::all();
        return view('home', [
            'mariages' => $mariages, 
            'naissances' => $naissances, 
            'divorces' => $divorces, 
            'deces' => $deces, 
            'jugements' => $jugements, 
            'citoyens' => $citoyens, 
            'users' => $users, 
        ]);
    }
}
