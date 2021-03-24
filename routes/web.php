<?php

use App\Models\User;
use App\Models\Ablum;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('photos.newsfeed', [
            'ablums' => auth()->user()->ablums,
        ]);
    })->name('photos.newsfeed');

    Route::get('/ablum', function () {
        return view('ablums.index');
    });
    Route::get('/ablum/create', function () {
        return view('ablums.create');
    });
    Route::get('ablum/{ablum}', function (Ablum $ablum) {
        return view('photos.gallary', compact('ablum'));
    })->name('photos.gallary');

    Route::get('edit/ablum/{ablum}', function (Ablum $ablum) {
        return view('ablums.edit', compact('ablum'));
    })
        ->name('ablum.edit')
        ->middleware('can:view,ablum');

    Route::get('profile/{user}', function (User $user) {
        return view('profile.index', compact('user'));
    })->name('profile');
});

require __DIR__ . '/auth.php';
