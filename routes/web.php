<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TreatmentController;

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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bookingData', [TransactionController::class, 'data'])->name('bookData');
    Route::post('/book', [TransactionController::class, 'dataPost'])->name('bookDataPost');

    Route::get('/bookingPayment', [TransactionController::class, 'payment'])->name('bookPayment');
    Route::post('/pay', [TransactionController::class, 'paymentPost'])->name('bookPaymentPost');

    Route::get('/kode/{transactionId}', [TransactionController::class, 'showCode'])->name('kodeBayar');
    Route::put('/kodePost', [TransactionController::class, 'insertCode'])->name('kodeBayarPost');
    Route::get('/confirm', [TransactionController::class, 'confirm'])->name('confirmation');

    Route::get('/status', [TreatmentController::class, 'status'])->name('user-status');


});

Route::get('/repaint', [TreatmentController::class, 'repaint'])->name('repaint');
Route::get('/repair', [TreatmentController::class, 'repair'])->name('repair');
Route::get('/unyellowing', [TreatmentController::class, 'unyellowing'])->name('unyellowing');



require __DIR__ . '/auth.php';
