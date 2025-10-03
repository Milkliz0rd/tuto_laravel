<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->controller(BlogController::class)->name("blog.")->group(function () {
    Route::get('/','index' )->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::post('/{post}/edit', 'update');
    Route::get('/{slug}-{post}','show')->where([
        'slug' => '[a-z0-9\-]+',
        'post' => '[0-9]+',
    ])->name('show');
        
});

