<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



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

Route::get('/', [EventController::class, 'welcome'])->name('welcome');
Route::post('forms/contact', [EventController::class, 'contactPost'])->name('contactPost');
Route::get('/about', [EventController::class, 'about'])->name('about');
Route::get('/terms', [EventController::class, 'terms'])->name('terms');
Route::get('/privacy_policy', [EventController::class, 'privacy_policy'])->name('privacy_policy');

Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
    Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::post('/profile/photo', [ProfileController::class, 'updateProfilePhoto']);
    Route::get('/preferences', [PreferenceController::class, 'index'])->name('preferences');
    Route::post('/preferences', [PreferenceController::class, 'store']);
    Route::delete('/preferences/delete/{id}', [PreferenceController::class, 'destroy']);
});

Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin'], function () {

    Route::get('/', [AdminUserController::class, 'index']);
    Route::patch('/{user}/update', [AdminUserController::class, 'update']);
    Route::get('/{user}/delete', [AdminUserController::class, 'delete']);
});
