<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/list-movies',function(){
    return view('list-movie');
})->name('list-movies');

Route::get('/list-movies/{movie_id}',function(){
    return view('Editpage');
})->name('edit');
