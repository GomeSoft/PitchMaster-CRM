<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use Illuminate\Support\Facades\DB;

class LeaguesController extends Controller
{
    public function index(){
        $leagues = DB::table('leagues')->get();
        //dd($leagues);
        $totalTeams = League::count();
        return view("leagues.index", compact("leagues", "totalTeams"));
    }

}
