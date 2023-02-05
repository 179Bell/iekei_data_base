<?php

declare(strict_types=1);

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', \App\Http\Actions\IndexShopInfoGetActions::class)->name('dashboard');
    Route::get('/shop_info/create', \App\Http\Actions\CreateShopInfoGetActions::class)->name('shop_info.create');
    Route::post('shop_info/create', \App\Http\Actions\CreateShopInfoPostActions::class)->name('shop_info.store');
    Route::post('/shop_info/delete', \App\Http\Actions\DeleteShopInfoPostActions::class)->name('shop_info.delete');
    Route::get('/shop_info/{id}', \App\Http\Actions\DetailShopInfoGetActions::class)->name('shop_info.detail');
    Route::post('/shop_info/{id}', \App\Http\Actions\UpdateShopInfoPostActions::class)->name('shop_info.update');
});
