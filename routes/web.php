<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth'])->group(function(){

    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
    
    // socialite route 
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // user dashboard 
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });

    // admin dashboard 
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
