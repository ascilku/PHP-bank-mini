<?php

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


//akses roles
Route::get('/login', [App\Http\Controllers\akses_roles\C_Akses::class, 'index'])->name('login');

Route::post('/login', [App\Http\Controllers\akses_roles\C_Akses::class, 'loginQuery'])->name('loginQuery');
Route::get('/login-logout' , [App\Http\Controllers\akses_roles\C_Akses::class, 'loginLogout'])->name('login-logout');
Route::post('/ubah-password' , [App\Http\Controllers\akses_roles\C_Akses::class, 'loginUbahPass'])->name('ubah-password');

//dashboard panel 
Route::get('/', [App\Http\Controllers\akses_roles\C_Dashboard::class, 'index'])->name('dashboard-panel');

//users
Route::get('/user/{key}', [App\Http\Controllers\user\C_User::class, 'index'])->name('user');
Route::post('/user', [App\Http\Controllers\user\C_User::class, 'userPost'])->name('user-post');
Route::get('/user-hapus', [App\Http\Controllers\user\C_User::class, 'userDelete'])->name('user_hapus');

//deposit
Route::get('/deposit/{key}', [App\Http\Controllers\deposit\C_Deposit::class, 'index'])->name('deposit');
Route::post('/deposit', [App\Http\Controllers\deposit\C_Deposit::class, 'depositPost'])->name('deposit-post');
Route::post('/deposit-users', [App\Http\Controllers\deposit\C_Deposit::class, 'depositPostUser'])->name('deposit-post-users');
Route::get('/deposit_hapus', [App\Http\Controllers\deposit\C_Deposit::class, 'depositDelete'])->name('deposit_hapus');

Route::post('/deposit-tarik-tunai', [App\Http\Controllers\traik_tunai\C_TarikTunai::class, 'depositPostTarikTunai'])->name('deposit-tarik-tunai');
Route::post('/deposit-transfer', [App\Http\Controllers\transfer\C_Transfer::class, 'depositTransfer'])->name('transfer');



