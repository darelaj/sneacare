<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bookingData', [TransactionController::class, 'data'])->name('bookData');
    Route::post('/book', [TransactionController::class, 'dataPost'])->name('bookDataPost');

    Route::get('/bookingPayment', [TransactionController::class, 'payment'])->name('bookPayment');
    Route::post('/pay', [TransactionController::class, 'paymentPost'])->name('bookPaymentPost');
});



require __DIR__ . '/auth.php';
