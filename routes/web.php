<?php
use App\Http\Controllers\UtilController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;
//Rota para Welcome page
Route::get('/welcome', function () {
    return view('welcome');
});

//Rotas para Home page
Route::get('/', [UtilController::class, 'index']);
Route::get('/home', [UtilController::class, 'index'])->name('utils.home');

// Rotas para as ligas
Route::get('/leagues', [LeaguesController::class, 'index'])->name('leagues.index');
Route::get('/league/create', [LeaguesController::class, 'create'])->name('leagues.create');
Route::post('/league/create', [LeaguesController::class, 'store'])->name('leagues.store');

//Rotas para os teams
Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('/team/create', [TeamsController::class, 'create'])->name('teams.create');
Route::post('/team/create', [TeamsController::class, 'store'])->name('teams.store');



