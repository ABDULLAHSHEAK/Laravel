<?php

use App\Http\Controllers\students;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[students::class,'index'])->name('index');
Route::get('/add_users', [students::class,'creat'])->name('creat');
Route::post('/storage', [students::class,'storage'])->name('storage');
Route::get('/edit/{id}', [students::class,'edit'])->name('edit');
Route::post('/update/{id}', [students::class, 'update'])->name('update');
Route::get('/delete/{id}', [students::class, 'delete'])->name('delete');