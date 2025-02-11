<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/about', function () {
    return inertia('About', ['name' => 'Nasir Shah']);
});

// another approach to use render page
Route::inertia('/contact', 'Contact', ['name' => 'Nasir Shah']);
