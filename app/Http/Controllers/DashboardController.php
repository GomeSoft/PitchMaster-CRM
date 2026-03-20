<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeagues = DB::table('leagues')->count();
        $totalTeams = DB::table('teams')->count();
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view("admin.Dashboard.dashboard", compact("totalLeagues", "totalTeams", "users"));
    }

    public function makeAdmin($id)
    {
        $user = \App\Models\User::find($id);
        $user->role = \App\Models\User::TYPE_ADMIN;
        $user->save();
        return redirect()->route('dashboard.index')->with('success', 'User made admin successfully!');
    }

    public function removeAdmin($id)
    {
        $user = \App\Models\User::find($id);
        $user->role = \App\Models\User::TYPE_USER;
        $user->save();
        return redirect()->route('dashboard.index')->with('success', 'User removed from admin successfully!');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect()->route('dashboard.index')->with('success', 'User deleted successfully!');
    }
}
