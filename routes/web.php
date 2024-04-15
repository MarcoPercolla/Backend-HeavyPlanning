<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OperatorController as AdminOperatorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MyMessageController;
use App\Http\Controllers\MyReviewController;
use App\Http\Controllers\MyStatisticsController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OperatorSponsorshipController;
use App\Http\Controllers\OperatorSponsorshipsController;
use App\Http\Controllers\ReviewController;

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

Route::get('/pay', function () {
    return view('payment_form');
});

Route::get('/checkout', [PaymentController::class, 'showPaymentPage'])->name('checkout');
Route::get('/payment-form', [PaymentController::class, 'showPaymentPage'])->name('payment-form.show');
Route::get('/client-token', [PaymentController::class, 'getClientToken']);
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process-payment');

Route::get('/dashboard', [OperatorController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('operators', AdminOperatorController::class);
        Route::resource("operator-sponsorships", OperatorSponsorshipsController::class);
        


    // Rotte per la gestione degli operatori
    Route::get('/operators', [AdminOperatorController::class, 'index'])->name('operators.index');
    Route::get('/operators/create', [AdminOperatorController::class, 'create'])->name('operators.create');
    Route::post('/operators', [AdminOperatorController::class, 'store'])->name('operators.store');
    Route::get('/operators/{operator}/edit', [AdminOperatorController::class, 'edit'])->name('operators.edit');
    Route::put('/operators/{operator}', [AdminOperatorController::class, 'update'])->name('operators.update');
    Route::delete('/operators/{operator}', [AdminOperatorController::class, 'destroy'])->name('operators.destroy');
    Route::get('/operators/{operator}', [AdminOperatorController::class, 'show'])->name('operators.show');
    Route::view('/error', 'admin.error')->name('error');

    Route::get("/my-messages/{operator_id}", [MyMessageController::class, "index"])->name("my-messages");

    Route::get("/my-review/{operator_id}", [MyReviewController::class, "index"])->name("my-reviews");

    Route::get("/operator-sponsorship/create/{operator_id}", [OperatorSponsorshipController::class, "create"])->name("operator-sponsorship.create");
    Route::post("/operator-sponsorship/store/{operator_id}", [OperatorSponsorshipController::class, "store"])->name("operator-sponsorship.store");

    Route::get("/my-statistics/{operator_id}", [MyStatisticsController::class, "index"])->name("my-statistics");
    Route::get("/my-statistics-message/{operator_id}", [MyStatisticsController::class, "message"])->name("my-statistics-message");
    Route::get("/my-statistics-review/{operator_id}", [MyStatisticsController:: class, "review"])->name("my-statistics-review");



});

Route::get("/message", [MessageController::class, "index"]);

Route::get("/review", [ReviewController::class, "index"]);

require __DIR__ . '/auth.php';


