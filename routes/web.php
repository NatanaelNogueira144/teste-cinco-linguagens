<?php

use App\Http\Controllers\{
    AuthController,
    ForgotPasswordController,
    FormController,
    HomeController,
    LanguageController,
    QuestionController,
    ResetPasswordController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'index'])->name('showLogin');

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'submit'])->name('forgotPassword.submit');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('resetPassword.index');
    Route::post('/reset-password/{token}', [ResetPasswordController::class, 'submit'])->name('resetPassword.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/edit', [AuthController::class, 'edit'])->name('auth.edit');
    Route::put('/update', [AuthController::class, 'update'])->name('auth.update');

    Route::prefix('form')->controller(FormController::class)->group(function () {
        Route::get('/', 'index')->name('form');
        Route::post('/submit', 'submit')->name('form.submit');
    });

    Route::middleware('auth.admin')->group(function () {
        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::get('/', 'index')->name('users.index');
            Route::post('/', 'store')->name('users.store');
            Route::get('/create', 'create')->name('users.create');
            Route::get('/{user}', 'show')->name('users.show');
            Route::put('/{user}', 'update')->name('users.update');
            Route::delete('/{user}', 'destroy')->name('users.destroy');
            Route::get('/{user}/edit', 'edit')->name('users.edit');
        });

        Route::prefix('languages')->controller(LanguageController::class)->group(function () {
            Route::get('/', 'index')->name('languages.index');
            Route::put('/{language}', 'update')->name('languages.update');
            Route::get('/{language}/edit', 'edit')->name('languages.edit');
        });

        Route::prefix('questions')->controller(QuestionController::class)->group(function () {
            Route::get('/', 'index')->name('questions.index');
            Route::put('/{question}', 'update')->name('questions.update');
            Route::get('/{question}/edit', 'edit')->name('questions.edit');
        });
    });
});

Route::fallback(function () {
    return view('404');
});