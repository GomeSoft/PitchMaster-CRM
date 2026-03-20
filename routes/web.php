<?php
use App\Http\Controllers\UtilController;
use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\DashboardController;
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
Route::get('/league/create', [LeaguesController::class, 'create'])->name('leagues.create')->middleware('auth');
Route::post('/league/create', [LeaguesController::class, 'store'])->name('leagues.store')->middleware('auth');
Route::get('/league/delete/{id}', [LeaguesController::class, 'delete'])->name('leagues.delete')->middleware('auth');
Route::get('/league/update/{id}', [LeaguesController::class, 'viewUpdate'])->name('leagues.viewUpdate')->middleware('auth');
Route::put('/league/update/{id}', [LeaguesController::class, 'update'])->name('leagues.update')->middleware('auth');

//Rotas para os teams
Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('/team/create', [TeamsController::class, 'create'])->name('teams.create')->middleware('auth');
Route::post('/team/create', [TeamsController::class, 'store'])->name('teams.store')->middleware('auth');
Route::get('/team/delete/{id}', [TeamsController::class, 'delete'])->name('teams.delete')->middleware('auth');
Route::get('/team/update/{id}', [TeamsController::class, 'viewUpdate'])->name('teams.viewUpdate')->middleware('auth');
Route::put('/team/update/{id}', [TeamsController::class, 'update'])->name('teams.update')->middleware('auth');


//Rotas para o dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

//Rota para tornar admin 
Route::post('/users/{user}/make-admin', [DashboardController::class, 'makeAdmin'])->name('users.make-admin')->middleware('auth');
//Rota para remover admin 
Route::post('/users/{user}/remove-admin', [DashboardController::class, 'removeAdmin'])->name('users.remove-admin')->middleware('auth');
//Rota para deletar user 
Route::delete('/users/{user}/delete', [DashboardController::class, 'destroy'])->name('users.destroy')->middleware('auth');