<?php

use Illuminate\Support\Facades\Route;
//Rota para Welcome page
Route::get('/welcome', function () {
    return view('welcome');
});

//Rotas para Home page
Route::get('/', function () {
    return view('utils.home');
});
Route::get('/home', function () {
    return view('utils.home');
});


