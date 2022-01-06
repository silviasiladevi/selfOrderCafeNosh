<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegisController;
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

Route::get('/', [MenuController::class, 'index'])->middleware('guest');
Route::get('/dashboard', [MenuController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/regis', [RegisController::class, 'index']);
Route::post('/regis', [RegisController::class, 'store']);
Route::get('/about', function () {
    return view('customers/about', [

        "title" => "About"
    ]);
});

Route::get('/history', [TransactionController::class, 'history']);
Route::post('/homeAdmin/keloladaftar/bayar/{trx}', [TransactionController::class, 'updateBayar'])->middleware('kasir');
Route::delete('/homeAdmin/keloladaftar/{trx}', [TransactionController::class, 'destroy'])->middleware('admin');
Route::get('/menu/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/menu', [MenuController::class, 'store']);
Route::get('/menu/create', [MenuController::class, 'create']);
Route::get('/admin', [AdminController::class, 'indexhome'])->middleware('admin');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/homeAdmin', [AdminController::class, 'indexhome'])->middleware(['admin', 'kasir']);
Route::get('/homeAdmin/kelolamenu', [AdminController::class, 'kelolamenu'])->middleware('admin');
Route::get('/homeAdmin/keloladaftar', [TransactionController::class, 'keloladaftar'])->middleware(['admin', 'kasir']);
Route::delete('/homeAdmin/{menu}', [MenuController::class, 'destroy'])->middleware('admin');
Route::get('/homeAdmin/{menu}/edit', [MenuController::class, 'edit'])->middleware('admin');
Route::patch('/homeAdmin/{menu}', [MenuController::class, 'update'])->middleware('admin');
Route::post('/{menu}/add', [CartController::class, 'store']);
Route::post('/cart/{cart}/update', [CartController::class, 'update']);
Route::delete('/menu/{cart}', [cartController::class, 'destroy']);
Route::post('/menu/cart/checkout', [TransactionController::class, 'store']);
Route::post('/homeAdmin/keloladaftar/{trx}', [TransactionController::class, 'updateStatus'])->middleware('kasir');
Route::post('/history/{trx}', [TransactionController::class, 'updateStatusCus']);
Route::post('/homeAdmin/kelolauser/{id}', [UserController::class, 'updateJabatan']);
Route::delete('/homeAdmin/kelolauser/{id}', [UserController::class, 'destroy']);
Route::get('/homeAdmin/kelolauser', [AdminController::class, 'kelolauser'])->middleware('admin');