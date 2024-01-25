<?php
// routes/admin.php 

use App\Models\Sell;
use App\Mail\OrderShipped;
use App\Models\PointOfSale;
use App\Http\Controllers\ImportCsv;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SellController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrderShipedController;
use App\Http\Controllers\Admin\HK\UomController;
use App\Http\Controllers\Admin\BarcodeController;
use App\Http\Controllers\Admin\HK\ColorContrller;
use App\Http\Controllers\Admin\HK\SizeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HK\BrandController;
use App\Http\Controllers\Admin\HK\ColorController;
use App\Http\Controllers\Admin\ItemInfoController;
use App\Http\Controllers\NewOrderPlacedController;
use App\Http\Controllers\Admin\HK\UomSetController;
use App\Http\Controllers\Admin\HK\CategoryController;
use App\Http\Controllers\Admin\PointOfSaleController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


    // brand Routes
    Route::get('/brand', function () {
        return view('admin.brand.index');
    })->name('brand');


    // color Routes
    Route::get('/color', function () {
        return view('admin.color.index');
    })->name('color');

    // size Routes
    Route::get('/size', function () {
        return view('admin.size.index');
    })->name('size');

    // uom-set Routes
    Route::get('/uom/set', function () {
        return view('admin.uom-set.index');
    })->name('uom-set');

    // uom Routes
    Route::get('/uom', function () {
        return view('admin.uom.index');
    })->name('uom');

    // store Routes
    Route::get('/store', function () {
        return view('admin.store.index');
    })->name('store');

    // employee Routes
    Route::get('/employee', function () {
        return view('admin.employee.index');
    })->name('employee');


    // seller Routes
    Route::get('/seller', function () {
        return view('admin.seller.index');
    })->name('seller');

    // expense Routes
    Route::get('/expense', function () {
        return view('admin.expense.index');
    })->name('expense');

    // daily-expense Routes
    Route::get('/daily-expense', function () {
        return view('admin.daily-expense.index');
    })->name('daily-expense');


    // products Routes
    Route::get('/products', function () {
        return view('admin.products.index');
    })->name('products');

    // product-create Routes
    Route::get('/product/create', function () {
        return view('admin.products.create');
    })->name('product-create');

    // product-edit Routes
    Route::get('/product/edit', function () {
        return view('admin.products.index');
    })->name('product-edit');

    // product-view Routes
    Route::get('/product/view', function () {
        return view('admin.products.view');
    })->name('product-view');

    // roles Routes
    Route::get('/roles', function () {
        return view('admin.roles&permissions.roles');
    })->name('roles');

    // permissions Routes
    Route::get('/permissions', function () {
        return view('admin.roles&permissions.permissions');
    })->name('permissions');


    // discount-decleare Routes
    Route::get('/discount-decleare', function () {
        return view('admin.discount-decleare.index');
    })->name('discount-decleare');






    // DMS-01:Assign Product to Sales Man
    Route::get('/assign-product-to-sales-man', function () {
        return view('admin.assign-product-to-sales-man.index');
    })->name('product-assign');

    // DMS-02: Hand Over Product to SalesMan (Stock-OUT For Store)
    Route::get('/hand-over-product-to-sales-man', function () {
        return view('admin.hand-over-product-to-sales-man.index');
    })->name('product-handover-to-salesman');


    // DMS-03: Update Sales Order Status 
    Route::get('/update-sales-status', function () {
        return view('admin.update-sales-status.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/cash-collection', function () {
        return view('admin.cash-collection.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/sells-return', function () {
        return view('admin.sells-return.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/payment-to-seller', function () {
        return view('admin.payment-to-seller.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/purchase-order', function () {
        return view('admin.purchase-order.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/purchase-order-receive', function () {
        return view('admin.purchase-order-receive.index');
    })->name('');

    // DMS-03: Update Sales Order Status 
    Route::get('/purchase-return', function () {
        return view('admin.purchase-return.index');
    })->name('');



    Route::get('/importcsv', [ImportCsv::class, 'index']);
    Route::post('/importcsvupload', [ImportCsv::class, 'upload_csv_file'])->name('uploadcsv');

    Route::get('/order', [OrderShipedController::class, 'OrderList'])->name('order.list');
    Route::post('/order/{orderId}', [OrderShipedController::class, 'sendOrderEmail'])->name('order.status');



    Route::resource('/custom-pages', PageController::class);

    Route::get('/custom-pages/{slug}', [PageController::class, 'show_custom_page']);




    Route::resource('/customers', CustomerController::class);
    Route::resource('/suppliers', SupplierController::class);

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













    // Logout route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
    // Route::post('user/register', [UserController::class, 'register'])->name('register');

});

Route::get('process', [DataController::class, 'processLargeData'])->name('data-process-start');

Route::get('/create-order', [NewOrderPlacedController::class, 'store']);

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function () {

// });


///register

// Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
// Route::post('user/register', [UserController::class, 'register'])->name('register');


// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
