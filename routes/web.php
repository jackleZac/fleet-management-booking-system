<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PromotionController as AdminPromotionController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth');
Route::post('/stripe/webhook', [PaymentController::class, 'webhook'])->name('stripe.webhook');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{id}/pay', [PaymentController::class, 'checkout'])->name('bookings.pay');
    Route::get('/bookings/create/{id}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/payment/success/{booking}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel/{booking}', [PaymentController::class, 'cancel'])->name('payment.cancel');
    });

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('cars', AdminCarController::class);
        Route::resource('bookings', AdminBookingController::class);
        Route::get('bookings/{id}/confirm', [AdminBookingController::class, 'confirm'])->name('bookings.confirm');
        Route::get('bookings/{id}/mark-as-paid', [AdminBookingController::class, 'markAsPaid'])->name('bookings.markAsPaid');
        Route::get('bookings/{id}/mark-as-active', [AdminBookingController::class, 'markAsActive'])->name('bookings.markAsActive');
        Route::get('bookings/{id}/complete', [AdminBookingController::class, 'complete'])->name('bookings.complete');
        Route::resource('promotions', AdminPromotionController::class);
        Route::resource('reviews', AdminReviewController::class);
        Route::resource('faqs', AdminFaqController::class);
        Route::resource('contact', AdminContactController::class);
    });

require __DIR__.'/auth.php';
