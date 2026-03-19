<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index(){
        $teams = DB::table("teams")->get();
        return view("teams.index", compact("teams"));
    }

    public function create(){
        $team = new Team();
        $leagues = DB::table("leagues")->get();
        return view("teams.storeTeam", compact("team", "leagues"));
    }

    public function store(Request $request){
        $request->validate([
            "league_id"=> "required",
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'stadium' => 'required|string|max:50',
            'founded_date' => 'required|integer|min:1800|max:2099',
            ///'badge' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::table('teams')->insert([
            'league_id'=> $request->league_id,
            'name' => $request->name,
            'country' => $request->country,
            'stadium' => $request->stadium,
            'founded_date' => $request->founded_date,
            //'badge' => $request->badge,
        ]);

        return redirect()->route("teams.index")->with("success", "Team created successfully");
    }
}
