<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExpeditionController;

Route::get('/', fn () => view('pages.home.main'))->name('home');
Route::get('contact', fn () => view('pages.contact.main'))->name('contact');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('reset', [AuthController::class, 'reset'])->name('reset');
Route::post('login', [AuthController::class, 'do_login'])->name('do_login');
Route::post('register', [AuthController::class, 'do_register'])->name('do_register');
Route::post('forgot', [AuthController::class, 'do_forgot'])->name('do_forgot');
Route::post('rese', [AuthController::class, 'do_reset'])->name('do_reset');

Route::middleware('auth')->group(function () {
    // AGENDA
    Route::resource('agendas', AgendaController::class);

    // EXPEDITION
    Route::resource('expeditions', ExpeditionController::class);

    // RULE
    Route::resource('rules', RuleController::class);

    // PROFILE
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // SERVICE
    Route::resource('services', ServiceController::class);

    // CONTACT
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

    Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
});
