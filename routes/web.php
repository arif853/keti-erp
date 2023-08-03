<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Sales\Order\OrderController;
use App\Http\Controllers\Sales\Quotes\QuotesController;
use App\Http\Controllers\Ledger\Customer\CustomerController;

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
    return view('admin.login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/sales/salesquotes/invoice', function () {
    return view('sales.quotes.invoice');
});

Route::get('/dashboard',[AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// sales
Route::get('/sales/salesquotes',[QuotesController::class, 'index'])->name('sales.salesquotes');
Route::get('/sales/salesorder',[OrderController::class, 'index'])->name('sales.salesorder');

//Customer
Route::get('/ledger/customer',[CustomerController::class, 'index'])->name('ledger.customer');
Route::get('/ledger/customer/edit',[CustomerController::class, 'edit'])->name('ledger.customer.edit');
Route::get('/ledger/customer/show',[CustomerController::class, 'show'])->name('ledger.customer.show');
Route::post('/ledger/customer/store',[CustomerController::class, 'store'])->name('ledger.customer.store');
Route::delete('/ledger/customer/destroy',[CustomerController::class, 'destroy'])->name('ledger.customer.destroy');






require __DIR__.'/auth.php';
