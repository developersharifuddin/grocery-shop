<?php
// routes/admin.php 

use App\Http\Controllers\ImportCsv;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SellController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrderShipedController;
use App\Http\Controllers\Admin\HK\UomController;
use App\Http\Controllers\Admin\BarcodeController;
use App\Http\Controllers\Admin\HK\ColorContrller;
use App\Http\Controllers\Admin\HK\SizeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HK\BrandController;
use App\Http\Controllers\Admin\ItemInfoController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\NewOrderPlacedController;
use App\Http\Controllers\Admin\HK\CategoryController;
use App\Http\Controllers\Admin\MoneyLendingController;
use App\Http\Controllers\Admin\DailyExpensesController;
use App\Http\Controllers\Admin\PurchaseOrdersController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // // HK-01:manage Category
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edits');


    Route::get('/importcsv', [ImportCsv::class, 'index']);
    Route::post('/importcsvupload', [ImportCsv::class, 'upload_csv_file'])->name('uploadcsv');

    Route::get('/order', [OrderShipedController::class, 'OrderList'])->name('order.list');
    Route::post('/order/{orderId}', [OrderShipedController::class, 'sendOrderEmail'])->name('order.status');


    Route::resource('/customers', CustomerController::class);
    Route::resource('/suppliers', SupplierController::class);
    Route::resource('/money-lending', MoneyLendingController::class);

    Route::resource('/brands', BrandController::class);
    Route::resource('/uoms', UomController::class);
    Route::resource('/colors', ColorContrller::class);
    Route::resource('/sizes', SizeController::class);
    Route::resource('/products', ItemInfoController::class);


    Route::resource('/sales', SellController::class);
    Route::get('/newsales', [SellController::class, 'newsale'])->name('newsale');
    Route::post('/newsales/getItemByBarcode', [SellController::class, 'getItem'])->name('newsaleitem');
    Route::get('/newsales/sales-invoice', [SellController::class, 'salesInvoice'])->name('salesInvoice');
    Route::get('/newsales/sales-print-Pos-Invoice', [SellController::class, 'printPosInvoice'])->name('printPosInvoice');

    Route::resource('/product/barcode', BarcodeController::class);
    Route::get('/generate-pdf', [BarcodeController::class, 'generatePDF'])->name('barcode.generate-pdf');

    Route::get('/BarcodePdf', [BarcodeController::class, 'BarcodePdf'])->name('BarcodePdf');

    Route::resource('/customers', CustomerController::class);


    Route::get('/loadProduct', [ItemInfoController::class, 'loadProduct'])->name('loadProduct');


    Route::resource('/daily-expenses', DailyExpensesController::class);
    Route::resource('/purchase-orders', PurchaseOrdersController::class);


    //report
    // Route::get('/transactions-detailed-by-customer.', [ItemInfoController::class, 'loadProduct'])->name('loadProduct');






    // Logout route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('process', [DataController::class, 'processLargeData'])->name('data-process-start');

Route::get('/create-order', [NewOrderPlacedController::class, 'store']);
