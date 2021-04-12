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
Route::get('home/data', [HomeController::class, 'index'])->name('data.index');

// show creation form
Route::get('home/data/create', [HomeController::class, 'create'])->name('data.create'); 

// post data
Route::post('home/data/post', [HomeController::class, 'store'])->name('data.store');


// route for pdf
Route::get('home/data/pdf', [HomeController::class, 'create_pdf'])->name('pdf');

Route::get('home/data/pdf/{id}', [HomeController::class, 'CreatePdfData'])->name('pdf_data');

Route::get('home/mail', [HomeController::class, 'email'])->name('email');