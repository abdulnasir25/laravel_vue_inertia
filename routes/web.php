<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// 1st approach to use render page
Route::get('/', function () {
    return Inertia::render('Home');
});

// 2nd approach to use render page
Route::get('/about', function () {
    return inertia('About', ['name' => 'Nasir Shah']);
});

// 3rd approach to use render page
Route::inertia('/contact', 'Contact', ['name' => 'Nasir Shah']);
