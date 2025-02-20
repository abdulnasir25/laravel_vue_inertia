<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function($query) use ($request) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%');
        })->paginate(5)->withQueryString(), // used to keep the search query in the URL, so that when we navigate to another page, the search query is still there.

        'searchTerm' => $request->search,

        'can' => [
            'delete_users' =>
                Auth::user() ?
                    Auth::user()->can('delete', User::class) : false,
        ],
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});
