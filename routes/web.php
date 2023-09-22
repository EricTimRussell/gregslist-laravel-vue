<?php

use App\Http\Controllers\AccountDetailsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\UserAccountController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show'])
  ->middleware('auth');

Route::resource('listing', ListingController::class)
  // have to be authenticated to visit these routes
  ->middleware('auth')
  ->only(['create', 'store', 'edit', 'update', 'destroy', 'restore'])
  ->withTrashed();

Route::name('listing.restore')
  ->put(
    'listing/{listing}/restore',
    [ListingController::class, 'restore']
  )->withTrashed();

Route::resource('listing', ListingController::class)
  // give access to all routes except these if not authenticated
  ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::resource('listing.offer', ListingOfferController::class)
  ->middleware('auth')
  ->only((['sotre']));


Route::resource('listing.image', ListingImageController::class)
  ->only(['create', 'store', 'destroy']);


Route::get('login', [AuthController::class, 'create'])
  ->name('login');
Route::post('login', [AuthController::class, 'store'])
  ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
  ->name('logout');

Route::resource('user-account', UserAccountController::class)
  ->only(['create', 'store']);

// user auth routes
Route::resource('user-account', UserAccountController::class)
  ->only(['index', 'edit', 'update', 'destroy'])
  ->middleware('auth');





// This is the routing the instructor is using but I am not
// Route::prefix('account-details')
//   ->name('account-details.')
//   ->middleware('auth')
//   ->group(function () {
//     Route::resource('listing', AccountDetailsController::class);
//   });
