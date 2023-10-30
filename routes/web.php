<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Sales\InvoiceController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Inventory\ItemsController;
use App\Http\Controllers\Inventory\StoreController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Sales\Order\OrderController;
use App\Http\Controllers\Sales\Quotes\QuotesController;
use App\Http\Controllers\Accounts\AccountGroupController;
use App\Http\Controllers\Inventory\IssueItemController;
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
    Route::get('/sales/quote/quote_invoice/{quotation_no}','view_pdf')->name('quote.quote_invoice');
    Route::get('/sales/quote/edit','edit')->name('quote.edit');
    Route::delete('/sales/quote/destroy','destroy')->name('quote.destroy');
    // Route::get('/sales/quote/view',[QuotesController::class, 'view'])->middleware('auth')->name('quote.view');
});

Route::controller(OrderController::class)->middleware('auth')->group(function () {
    Route::get('/sales/order', 'index')->name('order.index');
    Route::post('/sales/order/store','store')->name('order.store');
    Route::get('/sales/order/datatable','datatable')->name('order.datatable');
    Route::get('/sales/order/show/{order}','show')->name('order.show');

});


//sales invoice
Route::controller(InvoiceController::class)->middleware('auth')->group(function () {
    Route::get('/sales',  'index')->name('sales.index');

});

//sales invoice
Route::controller(PurchaseController::class)->middleware('auth')->group(function () {
    Route::get('/purchase', 'index')->name('purchase.index');

});


//Customer
Route::controller(CustomerController::class)->middleware('auth')->group(function () {
    Route::get('/ledger/customer', 'index')->name('ledger.customer');
    Route::post('/ledger/customer/store', 'store')->name('customer.store');
    Route::get('/ledger/customer/edit', 'edit')->name('customer.edit');
    Route::post('/ledger/customer/update', 'update')->name('customer.update');
    Route::get('/ledger/customer/show', 'show')->name('customer.show');
    Route::delete('/ledger/customer/destroy', 'destroy')->name('customer.destroy');
    Route::get('/ledger/customer/customerview/{customer}', 'customerview')->name('customer.customerview');

});

//Supplier
Route::controller(SupplierController::class)->middleware('auth')->group(function () {
    Route::get('/ledger/supplier',[SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/ledger/supplier/show',[SupplierController::class, 'show'])->name('supplier.show');

});


// Accounts
Route::controller(AccountGroupController::class)->middleware('auth')->group(function () {
    Route::get('/account/groups',[AccountGroupController::class, 'index'])->name('accounts.index');
    Route::post('/account/groups/store', 'store')->name('accounts.store');
    Route::get('/account/groups/show',[AccountGroupController::class, 'show'])->name('accounts.group');
});


//Inventory

// Item or product
Route::controller(ItemsController::class)->middleware('auth')->group(function () {
    Route::get('/inventory/items','index')->name('items.index');
    Route::post('/inventory/items/issue','issue_item')->name('items.issue');
    Route::post('/inventory/items/store','store')->name('items.store');
    // Route::get('/inventory/items/datatable','datatable')->name('items.datatable');
    Route::get('/inventory/items/show/{id}','show')->name('items.show');
});

// Route::controller(IssueItemController::class)->middleware('auth')->group(function () {
//     Route::get('/inventory/issue/items','index')->name('itemsissue.index');
//     Route::get('/inventory/issue/items','index')->name('itemsissue.index');
//     Route::post('/inventory/issue/items/store','store')->name('issue.store');
//     Route::get('/inventory/items/datatable','datatable')->name('items.datatable');
//     Route::get('/inventory/issue/items/show/{id}','show')->name('issue.show');
// });

//store
Route::controller(StoreController::class)->middleware('auth')->group(function () {
    Route::get('/inventory/store', [StoreController::class, 'index'])->name('store.index');
});

//Company
Route::controller(CompanyController::class)->middleware('auth')->group(function () {
    Route::get('/company', 'index')->name('company.index');
});

require __DIR__.'/auth.php';
