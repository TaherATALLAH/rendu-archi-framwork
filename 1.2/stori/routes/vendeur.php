<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('vendeur')->user();

    //dd($users);

    return view('vendeur.home');
})->name('home');

