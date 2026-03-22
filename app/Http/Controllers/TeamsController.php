<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = DB::table("teams")->get();

        $search = request()->query('search');
        $query = DB::table('teams');

        if (!empty(request()->query('league_id'))) {
            $query->where('league_id', request()->query('league_id'));
        }

        if ($search && $search !== 'null') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('country', 'like', '%' . $search . '%')
                    ->orWhere('stadium', 'like', '%' . $search . '%');
            });
        }

        $teams = $query->get();


        return view("teams.index", compact("teams"));
    }

    public function create()
    {
        $team = new Team();
        $leagues = DB::table("leagues")->get();
        return view("teams.storeTeam", compact("team", "leagues"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "league_id" => "required",
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'stadium' => 'required|string|max:50',
            'founded_date' => 'required|integer|min:1800|max:2099',
        ]);

        $badgePath = null;
        if ($request->hasFile('badge')) {
            $badgePath = $request->file('badge')->store('badges', 'public');
        }

        DB::table('teams')->insert([
            'league_id' => $request->league_id,
            'name' => $request->name,
            'country' => $request->country,
            'stadium' => $request->stadium,
            'founded_date' => $request->founded_date,
            'badge' => $badgePath,
        ]);
        //dd($request->all());
        return redirect()->route("teams.index")->with("message", "Team created successfully");
    }

    public function delete($id)
    {
        DB::table('teams')->where('id', $id)->delete();
        return redirect()->route("teams.index")->with("message", "Team deleted successfully");
    }

    public function viewUpdate($id)
    {
        $team = DB::table("teams")->where("id", $id)->first();
        $leagues = DB::table("leagues")->get();
        return view("teams.edit", compact("team", "leagues"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "league_id" => "required",
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'stadium' => 'required|string|max:50',
            'founded_date' => 'required|integer|min:1800|max:2099',
        ]);

        $badgePath = null;
        if ($request->hasFile('badge')) {
            $badgePath = $request->file('badge')->store('badges', 'public');
        }

        DB::table('teams')->where('id', $id)->update([
            'league_id' => $request->league_id,
            'name' => $request->name,
            'country' => $request->country,
            'stadium' => $request->stadium,
            'founded_date' => $request->founded_date,
            'badge' => $badgePath,

        ]);

        return redirect()->route("teams.index")->with("message", "Team updated successfully");
    }
}
