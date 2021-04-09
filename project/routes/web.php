<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
	// redirect to create form route
    return redirect()->route('data.create');
});


// return data
Route::get('home/datas', [HomeController::class, 'index'])->name('data.index');

// show creation form
Route::get('home/data/create', [HomeController::class, 'create'])->name('data.create'); 

// post data
Route::post('home/data/post', [HomeController::class, 'store'])->name('data.store');