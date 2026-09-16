<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\SubscriptionPackageController;
use App\Models\SubscriptionPackage;

// Route yang bisa diakses siapa saja (Guest & Login)
Route::get('/home', function () {
    $subscriptionPackages = SubscriptionPackage::take(3)->get();
    return view('home', compact('subscriptionPackages'));
})->name('home');

// Route untuk pengguna yang belum login (Guest)
Route::middleware(['isGuest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', function () {
        return view('register');
    })->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register.store');

    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.store');
});

// Route untuk pengguna yang sudah login (Logged In)
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout.post');

    // Route dengan prefix admin (hanya bisa diakses oleh role admin)
    Route::prefix('admin')->name('admin.')->middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        //resource 
        Route::resource('kategori-buku', BookCategoryController::class);
        Route::resource('paket-langganan', SubscriptionPackageController::class);
    });
});

    