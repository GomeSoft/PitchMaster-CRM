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
        $totalTeams = DB::table('teams')->count();

        $search = request()->query('search');
        $query = DB::table('leagues');

        if (!empty(request()->query('league_id'))) {
            $query->where('league_id', request()->query('league_id'));
        }

        if ($search && $search !== 'null') {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('country', 'like', '%' . $search . '%');
            });
        }

        $leagues = $query->get();

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
        return redirect()->route("leagues.index")->with("message", "League created successfully");
    }

    public function delete($id){
        DB::table('leagues')->where('league_id', $id)->delete();
        return redirect()->route("leagues.index")->with("message", "League deleted successfully");
    }

    public function viewUpdate($id){
        $league = DB::table('leagues')->where('league_id', $id)->first();
        return view("leagues.edit", compact("league"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            //'logo' => 'nullable|image|max:2048' ,
            
        ]);
        DB::table('leagues')->where('league_id', $id)->update([
            'name' => $request->name,
            'country' => $request->country,
            //'logo' => $request->logo,
        ]);
        return redirect()->route("leagues.index")->with("message", "League updated successfully");
    }
}
