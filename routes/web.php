<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('locale')->prefix('/{locale}')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('welcome');
    Route::get('/signup', [HomeController::class, 'sign'])->middleware('guest')->name('signup');
    Route::post('/sign_up', [ProfileController::class, 'sign_up'])->name('sign_up');
    Route::get('/signin', [HomeController::class, 'login'])->middleware('guest')->name('signin');
    Route::post('/sign_in', [HomeController::class, 'sign_in'])->name('sign_in');
    Route::post('logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');
    Route::get('/cart', [CartController::class, 'cart'])->middleware('auth')->name('cart');
    Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth')->name('profile');
    Route::put('/update_profile/{id}', [ProfileController::class, 'update'])->name('update.profile');
    Route::get('/acc_main', [ProfileController::class, 'maintenance'])->middleware('auth')->middleware('role:1')->name('acc_main');
    Route::post('/delete/{id}', [ProfileController::class, 'delete'])->name('delete_acc');
    Route::get('/update/{id}', [ProfileController::class, 'updaterole'])->middleware('auth')->middleware('role:1')->name('updaterole');
    Route::post('/update/{id}', [ProfileController::class, 'update_role'])->name('update_role');
    Route::get('/home/{id}', [HomeController::class, 'detail'])->middleware('auth')->name('detail');
    Route::post('/rent/{id}', [CartController::class, 'rent'])->name('rent');
    Route::post('/delete/{id}', [CartController::class, 'delete'])->name('delete');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('co');
});


