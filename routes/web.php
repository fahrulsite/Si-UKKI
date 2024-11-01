<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

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


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');
Route::get('/event/category/{category}', [EventController::class, 'category'])->name('event.category');

Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');
Route::get('/volunteer/{slug}', [VolunteerController::class, 'show'])->name('volunteer.show');
Route::get('/volunteer/category/{category}', [VolunteerController::class, 'category'])->name('volunteer.category');

Route::get('/contact', function () {
    return view('contact');
});