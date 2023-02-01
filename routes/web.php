<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, "index"]);

    Route::post("/add-anime", [AdminController::class, "addAnime"]);
    
    Route::post("/add-episode", [AdminController::class, "addAnimeEpisode"]);


});


Route::get('/', [AnimeController::class, 'index']);

Route::get('/sign-up', function () {
    return view('sign-up');
});
Route::post('/sign-up', [UserController::class, 'signUp']);


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, "login"]);

Route::get('/logout', [UserController::class, "logout"]);

Route::get('/anime-details/{animeName}', [AnimeController::class, "animeDetail"]);
Route::get('/anime-watching/{animeSlug}/{animeSeason}/{animeEpisode}', [AnimeController::class, "watchAnime"]);

Route::post('/comment', [UserController::class, 'comment']);


