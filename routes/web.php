<?php

use App\Http\Livewire\Cart\ShoppingAdd;
use App\Http\Livewire\Cart\ShoppingCart;
use App\Http\Livewire\Cart\ShoppingSetting;
use App\Http\Livewire\Sale\CreateSale;
use App\Http\Livewire\Home\Dashboard;
use App\Http\Livewire\Products\Lines;
use App\Http\Livewire\Products\ProductIndex;
use App\Http\Livewire\Profile\Setting;
use App\Http\Livewire\Quote\QuoteOnline;
use App\Http\Livewire\Sketch\Confirm;
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



/** HOME */
Route::get('/', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');


/** PRODUCTS */
Route::get('/products/lines', Lines::class)->middleware(['auth'])->name('lines');


/** CART */
Route::get('/cart', ShoppingCart::class)->middleware(['auth'])->name('cart');
Route::get('/cart/line/{id}', ShoppingAdd::class)->middleware(['auth'])->name('cart.add');
Route::get('/cart/setting', ShoppingSetting::class)->middleware(['auth'])->name('cart.setting');


/** SALE */
Route::get('sale/create', CreateSale::class)->middleware(['auth'])->name('sale.create');


/** QUOTE */
Route::get('/quote/quoteonline', QuoteOnline::class)->middleware(['auth'])->name('quote.online');

/** SKETCHS */
Route::get('/sketch/confirm', Confirm::class)->middleware(['auth'])->name('sketch.confirm');

/** PROFILE */
Route::get('/profile/setting', Setting::class)->middleware(['auth'])->name('profile.setting');



require __DIR__.'/auth.php';
