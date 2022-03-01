<?php

use App\Http\Livewire\Cart\ShoppingAdd;
use App\Http\Livewire\Cart\ShoppingCart;
use App\Http\Livewire\Cart\ShoppingSetting;
use App\Http\Livewire\Sale\CreateSale;
use App\Http\Livewire\Home\Dashboard;
use App\Http\Livewire\Products\Lines;
use App\Http\Livewire\Products\UploadProduct;
use App\Http\Livewire\Profile\Setting;
use App\Http\Livewire\Quote\QuoteOnline;
use App\Http\Livewire\Sale\SaleList;
use App\Http\Livewire\Sketch\Confirm;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

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


/** AUTH */

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
->middleware('guest')
->name('login');


Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
->middleware('auth')
->name('logout');



/** HOME */
Route::get('/', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');


/** PRODUCTS */
Route::get('/products/lines', Lines::class)->middleware(['auth'])->name('lines');
Route::get('/products/upload', UploadProduct::class)->middleware(['auth'])->name('product.upload');


/** CART */
Route::get('/cart', ShoppingCart::class)->middleware(['auth'])->name('cart');
Route::get('/cart/line/{id}', ShoppingAdd::class)->middleware(['auth'])->name('cart.add');
Route::get('/cart/setting', ShoppingSetting::class)->middleware(['auth'])->name('cart.setting');


/** SALE */
Route::get('sale/create', CreateSale::class)->middleware(['auth'])->name('sale.create');
Route::get('sale/list', SaleList::class)->middleware(['auth'])->name('sale.list');


/** QUOTE */
Route::get('/quote/quoteonline', QuoteOnline::class)->middleware(['auth'])->name('quote.online');

/** SKETCHS */
Route::get('/sketch/{id}/confirm/{notifyId}', Confirm::class)->middleware(['auth'])->name('sketch.confirm');

/** PROFILE */
Route::get('/profile/setting', Setting::class)->middleware(['auth'])->name('profile.setting');



require __DIR__.'/auth.php';
