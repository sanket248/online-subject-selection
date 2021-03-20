<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

//user routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/vote', [
    VoteController::class, 'show'
])->name('vote');

Route::middleware(['auth:sanctum', 'verified'])->get('/confirmvote/{sid}',[
    VoteController::class, 'confirmvote'
 ])->name('confirmvote');

Route::middleware(['auth:sanctum', 'verified'])->get('/result', [
    VoteController::class, 'result'
])->name('result');

//admin routes

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-dashboard', [
    AdminController::class, 'admin_dashboard'
])->name('admin-dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/subjects', [
    AdminController::class, 'subject'
])->name('subjects');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin-result', [
    AdminController::class, 'admin_result'
])->name('admin-result');