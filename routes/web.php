<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Sales\InvoiceController;
use App\Http\Controllers\Sales\Order\OrderController;
use App\Http\Controllers\Sales\Quotes\QuotesController;
use App\Http\Controllers\Accounts\AccountGroupController;
use App\Http\Controllers\Ledger\Customer\CustomerController;
use App\Http\Controllers\Ledger\Supplier\SupplierController;

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
Route::controller(QuotesController::class)->middleware('auth')->group(function () {
    Route::get('/sales/quote',[QuotesController::class, 'index'])->name('quote.index');
    Route::post('/sales/quote/store',[QuotesController::class, 'store'])->name('quote.store');
    Route::get('/sales/quote/datatable',[QuotesController::class, 'datatable'])->name('quote.datatable');
    Route::get('/sales/quote/show/{quotation_no}',[QuotesController::class, 'show'])->name('quote.show');
    // Route::get('/sales/quote/view',[QuotesController::class, 'view'])->middleware('auth')->name('quote.view');
});

Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/sales/order',[OrderController::class, 'index'])->name('order.index');

});


//sales invoice
Route::get('/sales', [InvoiceController::class, 'index'])->middleware('auth')->name('sales.index');

//Customer
Route::get('/ledger/customer',[CustomerController::class, 'index'])->middleware('auth')->name('ledger.customer');
Route::post('/ledger/customer/store',[CustomerController::class, 'store'])->middleware('auth')->name('customer.store');
Route::get('/ledger/customer/edit',[CustomerController::class, 'edit'])->middleware('auth')->name('customer.edit');
Route::post('/ledger/customer/update',[CustomerController::class, 'update'])->middleware('auth')->name('customer.update');
Route::get('/ledger/customer/show',[CustomerController::class, 'show'])->middleware('auth')->name('customer.show');
Route::delete('/ledger/customer/destroy',[CustomerController::class, 'destroy'])->middleware('auth')->name('customer.destroy');
Route::get('/ledger/customer/customerview/{customer}',[CustomerController::class, 'customerview'])->middleware('auth')->name('customer.customerview');

//Supplier
Route::get('/ledger/supplier',[SupplierController::class, 'index'])->middleware('auth')->name('ledger.supplier');
Route::get('/ledger/supplier/show',[SupplierController::class, 'show'])->middleware('auth')->name('ledger.supplier.show');


// Accounts
Route::get('/account/groups',[AccountGroupController::class, 'index'])->middleware('auth')->name('accounts.index');
Route::get('/account/groups/show',[AccountGroupController::class, 'show'])->middleware('auth')->name('accounts.group');






require __DIR__.'/auth.php';
