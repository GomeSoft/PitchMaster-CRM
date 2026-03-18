<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    public function index(){
        $teams = DB::table("teams")->get();
        return view("teams.index", compact("teams"));
    }

}
