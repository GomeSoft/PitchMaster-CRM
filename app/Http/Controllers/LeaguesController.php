<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use Illuminate\Support\Facades\DB;

class LeaguesController extends Controller
{
    public function index()
    {
        $leagues = DB::table('leagues')->get();
        //dd($leagues);
        $totalTeams = League::count();
        return view("leagues.index", compact("leagues", "totalTeams"));
    }

    public function create()
    {
        $league = new League();
        
        return view("leagues.storeLeague", compact("league"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            //'logo' => 'nullable|image|max:2048' ,
            
        ]);
        DB::table('leagues')->insert([
            'name' => $request->name,
            'country' => $request->country,
            //'logo' => $request->logo,
        ]);
        return redirect()->route("leagues.index")->with("success", "League created successfully");
    }
}
