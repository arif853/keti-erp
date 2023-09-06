<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Sales\InvoiceController;
use App\Http\Controllers\Inventory\ItemsController;
use App\Http\Controllers\Inventory\StoreController;
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
    Route::get('/sales/quote','index')->name('quote.index');
    Route::post('/sales/quote/store','store')->name('quote.store');
    Route::get('/sales/quote/datatable','datatable')->name('quote.datatable');
    Route::get('/sales/quote/show/{quotation_no}','show')->name('quote.show');
    Route::get('/sales/quote/edit','edit')->name('quote.edit');
    Route::delete('/sales/quote/destroy','destroy')->name('quote.destroy');
    // Route::get('/sales/quote/view',[QuotesController::class, 'view'])->middleware('auth')->name('quote.view');
});

Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/sales/order',[OrderController::class, 'index'])->name('order.index');

});


//sales invoice
Route::controller(InvoiceController::class)->middleware('auth')->group(function () {
    Route::get('/sales', [InvoiceController::class, 'index'])->name('sales.index');

});

//Customer
Route::controller(CustomerController::class)->middleware('auth')->group(function () {
    Route::get('/ledger/customer',[CustomerController::class, 'index'])->name('ledger.customer');
    Route::post('/ledger/customer/store',[CustomerController::class, 'store'])->name('customer.store');
    Route::get('/ledger/customer/edit',[CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/ledger/customer/update',[CustomerController::class, 'update'])->name('customer.update');
    Route::get('/ledger/customer/show',[CustomerController::class, 'show'])->name('customer.show');
    Route::delete('/ledger/customer/destroy',[CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/ledger/customer/customerview/{customer}',[CustomerController::class, 'customerview'])->name('customer.customerview');

});

//Supplier
Route::controller(SupplierController::class)->middleware('auth')->group(function () {
    Route::get('/ledger/supplier',[SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/ledger/supplier/show',[SupplierController::class, 'show'])->name('supplier.show');

});


// Accounts
Route::controller(AccountGroupController::class)->middleware('auth')->group(function () {
    Route::get('/account/groups',[AccountGroupController::class, 'index'])->name('accounts.index');
    Route::get('/account/groups/show',[AccountGroupController::class, 'show'])->name('accounts.group');
});


//Inventory

Route::controller(ItemsController::class)->middleware('auth')->group(function () {
    Route::get('/inventory/items', [ItemsController::class, 'index'])->name('items.index');
});

Route::controller(StoreController::class)->middleware('auth')->group(function () {
    Route::get('/inventory/store', [StoreController::class, 'index'])->name('store.index');
});


require __DIR__.'/auth.php';
