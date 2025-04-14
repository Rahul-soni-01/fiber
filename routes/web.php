<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblPurchaseItemController;
use App\Http\Controllers\TblUserController;
use App\Http\Controllers\TblPartyController;
use App\Http\Controllers\TblCategoryController;
use App\Http\Controllers\TblSubCategoryController;
use App\Http\Controllers\TblPurchaseController;
use App\Http\Controllers\TblStockController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ManagePermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\TblCustomerController;
use App\Http\Controllers\TbltypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TblAccCoaController;
use App\Http\Controllers\TblBankController;
use App\Http\Controllers\TblExpenseController;
use App\Http\Controllers\TblSaleProductCategoryController;
use App\Http\Controllers\TblSaleProductSubCategoryController;
use App\Http\Controllers\GstPdfTableController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\PdfGeneratorController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ManufactureReportLayoutController;


Route::get('/generate-pdf', [PdfGeneratorController::class, 'pdfGenerator'])->name('generate-pdf');

Route::post('login', [TblUserController::class, 'login'])->name('login.post');
Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');
Route::get('logout', [TblUserController::class, 'logout'])->name('logout');

Route::get('/welcome', function () {
    return view('demo');
});

Route::middleware('auth')->group(function () {
    Route::post('/check_permission', [TblUserController::class, 'permission'])->name('check_permission');
    Route::post('/check_stock', [TblStockController::class, 'check_stock'])->name('check_stock');
    // Home Blade
    Route::get('/home', [TblUserController::class, 'show'])->name('home');
    Route::get('/websetting', [DepartmentController::class, 'websetting'])->name('websetting');
    Route::post('/websetting-update', [DepartmentController::class, 'updateWebSetting'])->name('websetting.update');


    Route::get('/datainsert', [TblStockController::class, 'datainsert'])->name('datainsert');

    // User Crud
    Route::get('/user', [TblUserController::class, 'index'])->name('user.index');
    Route::get('/user-create', [TblUserController::class, 'create'])->name('user.create');
    Route::post('/user-store', [TblUserController::class, 'store'])->name('user.store');
    Route::get('edit-user-{user_id}', [TblUserController::class, 'edit'])->name(('user.edit')); //View deparment By id.
    Route::put('/user/{id}', [TblUserController::class, 'update'])->name('user.update');
    Route::delete('/user-{user_id}', [TblUserController::class, 'destroy'])->name('user.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions-add', [PermissionController::class, 'create'])->name('permissions.add');

    // manage-permissions Crud
    Route::get('/manage-permissions', [ManagePermissionController::class, 'index'])->name('manage.permissions');
    Route::get('/manage-permissions-create', [ManagePermissionController::class, 'create'])->name('manage.permissions.create');
    Route::post('/manage-permissions-store', [ManagePermissionController::class, 'store'])->name('manage.permissions.store');
    Route::get('/manage-permissions-departments-{id}', [ManagePermissionController::class, 'edit'])->name('managePermissions.departments');
    Route::post('/manage-permissions-update-{id}', [ManagePermissionController::class, 'update'])->name('manage-permissions.update');

    // predefine edit
    Route::get('/predefine', [TblAccCoaController::class, 'predefine'])->name('predefine.index');
    Route::put('/predefine-update', [TblAccCoaController::class, 'predefineUpdate'])->name('predefine.update');

    // acccoa Crud
    Route::get('/acccoa', [TblAccCoaController::class, 'index'])->name('acccoa.index');
    Route::get('/acccoa-create', [TblAccCoaController::class, 'create'])->name('acccoa.create');
    Route::post('/acccoa-store', [TblAccCoaController::class, 'store'])->name('acccoa.store');
    Route::get('edit-acccoa-{acccoa_id}', [TblAccCoaController::class, 'edit'])->name(('acccoa.edit')); //View acccoa By id.
    Route::put('/acccoa/{id}', [TblAccCoaController::class, 'update'])->name('acccoa.update');
    Route::delete('/acccoa{acccoa_id}', [TblAccCoaController::class, 'destroy'])->name('acccoa.destroy');

    //saleproductcategory crud
    Route::get('/saleproductcategory', [TblSaleProductCategoryController::class, 'index'])->name('saleproductcategory.index');
    Route::get('/saleproductcategory-create', [TblSaleProductCategoryController::class, 'create'])->name('saleproductcategory.create');
    Route::post('/saleproductcategory-store', [TblSaleProductCategoryController::class, 'store'])->name('saleproductcategory.store');
    Route::get('edit-saleproductcategory-{id}', [TblSaleProductCategoryController::class, 'edit'])->name('saleproductcategory.edit');
    Route::get('show-saleproductcategory-{id}', [TblSaleProductCategoryController::class, 'show'])->name('saleproductcategory.show');
    Route::put('/saleproductcategory/{id}', [TblSaleProductCategoryController::class, 'update'])->name('saleproductcategory.update');
    Route::delete('/saleproductcategory/{id}', [TblSaleProductCategoryController::class, 'destroy'])->name('saleproductcategory.destroy');

    //saleproductsubcategory crud
    Route::get('/saleproductsubcategory', [TblSaleProductSubCategoryController::class, 'index'])->name('saleproductsubcategory.index');
    Route::get('/saleproductsubcategory-create', [TblSaleProductSubCategoryController::class, 'create'])->name('saleproductsubcategory.create');
    Route::post('/saleproductsubcategory-store', [TblSaleProductSubCategoryController::class, 'store'])->name('saleproductsubcategory.store');
    Route::get('edit-saleproductsubcategory-{id}', [TblSaleProductSubCategoryController::class, 'edit'])->name('saleproductsubcategory.edit');
    Route::get('show-saleproductsubcategory-{id}', [TblSaleProductSubCategoryController::class, 'show'])->name('saleproductsubcategory.show');
    Route::put('/saleproductsubcategory-{id}', [TblSaleProductSubCategoryController::class, 'update'])->name('saleproductsubcategory.update');
    Route::delete('/saleproductsubcategory/{id}', [TblSaleProductSubCategoryController::class, 'destroy'])->name('saleproductsubcategory.destroy');

    //bank crud
    Route::get('/bank', [TblBankController::class, 'index'])->name('banks.index');
    Route::get('/bank-create', [TblBankController::class, 'create'])->name('banks.create');
    Route::post('/bank-store', [TblBankController::class, 'store'])->name('banks.store');
    Route::get('edit-bank-{bank_id}', [TblBankController::class, 'edit'])->name(('banks.edit')); //View deparment By id.
    Route::get('show-bank-{bank_id}', [TblBankController::class, 'show'])->name(('banks.show')); //View deparment By id.
    Route::put('/bank/{id}', [TblBankController::class, 'update'])->name('banks.update');
    Route::delete('/bank{department_id}', [TblBankController::class, 'destroy'])->name('banks.destroy');

    // expensive crud
    Route::get('/expense', [TblExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/expense-create', [TblExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expense-store', [TblExpenseController::class, 'store'])->name('expenses.store');
    Route::get('edit-expense-{expense_id}', [TblExpenseController::class, 'edit'])->name('expenses.edit'); // View expense by ID
    Route::get('show-expense-{expense_id}', [TblExpenseController::class, 'show'])->name('expenses.show'); // View expense by ID
    Route::put('/expense/{id}', [TblExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expense{expense_id}', [TblExpenseController::class, 'destroy'])->name('expenses.destroy');

    // departments Crud
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments-create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments-store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('edit-department-{department_id}', [DepartmentController::class, 'edit'])->name(('departments.edit')); //View deparment By id.
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments{department_id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    // payment crud
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/customer-payment', [PaymentController::class, 'CustomerIndex'])->name('payment.customer.index');
    Route::get('/payment-supplier-create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/payment-customer-create', [PaymentController::class, 'customercreate'])->name('payment.customer.create');
    Route::post('/payment-store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('edit-payment{payment_id}', [PaymentController::class, 'edit'])->name(('payment.edit')); //View deparment By id.
    Route::put('/payment/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/payment{department_id}', [PaymentController::class, 'destroy'])->name('payment.destroy');

    // Party Crud
    Route::get('party-purchase-details-{party_id}', [TblPartyController::class, 'Purchase_details'])->name(('party.purchase.details'));
    Route::get('customer-sell-details-{customer_id}', [TblCustomerController::class, 'Sale_details'])->name(('customer.sell.details'));

    Route::get('party-create', [TblPartyController::class, 'create'])->name('party.create');
    Route::get('party', [TblPartyController::class, 'index'])->name('party.show');
    Route::post('party-store', [TblPartyController::class, 'store'])->name('party.store');
    Route::get('edit-party-{party_id}', [TblPartyController::class, 'edit'])->name(('party.edit'));
    Route::put('/party-{id}', [TblPartyController::class, 'update'])->name('party.update');
    Route::delete('/party-{party_id}', [TblPartyController::class, 'destroy'])->name('party.destroy');
    Route::get('party-search', [TblPartyController::class, 'search'])->name('party.search');

    // Type Crud
    Route::get('type-create', [TbltypeController::class, 'create'])->name('type.create');
    Route::get('type', [TbltypeController::class, 'index'])->name('type.index');
    Route::post('type-store', [TbltypeController::class, 'store'])->name('type.store');
    Route::get('edit-type-{type_id}', [TbltypeController::class, 'edit'])->name(('type.edit'));
    Route::put('/type-{id}', [TbltypeController::class, 'update'])->name('type.update');
    Route::delete('/type-{type_id}', [TbltypeController::class, 'destroy'])->name('type.destroy');
    // Route::get('search', [TbltypeController::class, 'search'])->name('type.search');

    // category crud
    Route::get('category', [TblCategoryController::class, 'index'])->name('category.index');
    Route::get('add_category', [TblCategoryController::class, 'create'])->name('category.create');
    Route::post('category-store', [TblCategoryController::class, 'store'])->name('category.store');
    Route::get('edit-category-{category_id}', [TblCategoryController::class, 'edit'])->name(('category.edit'));
    Route::put('/category-{id}', [TblCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category-{category_id}', [TblCategoryController::class, 'destroy'])->name('category.destroy');

    //sub category Crud
    Route::get('subcategory', [TblSubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('subcategory-create', [TblSubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('subcategory-store', [TblSubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('edit-subcategory-{subcategory_id}', [TblSubCategoryController::class, 'edit'])->name(('subcategory.edit'));
    Route::put('/subcategory-{id}', [TblSubCategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('/subcategory-{subcategory_id}', [TblSubCategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::get('inward-payment', [TblPurchaseController::class, 'paymentindex'])->name('inward.payment.index');

    Route::get('/invoices', [TblPurchaseItemController::class, 'index'])->name('invoices.index'); // Show list of invoices
    Route::post('/invoices-select', [TblPurchaseItemController::class, 'select'])->name('invoices.select'); // Select invoice for report
    // inward crud
    Route::get('inward-return-show-{invoice_no}', [TblPurchaseController::class, 'Return_show_id'])->name('inward.return.show');
    Route::get('inward-return', [TblPurchaseController::class, 'ReturnIndex'])->name('inward.return.index');
    Route::get('inward-return-create', [TblPurchaseController::class, 'Return_Create'])->name('purchase.return.create');
    Route::post('inward-return-store', [TblPurchaseController::class, 'Return_Store'])->name('purchase.return.store');
    Route::get('inward', [TblPurchaseController::class, 'index'])->name('inward.index');
    Route::get('good_inward', [TblPurchaseController::class, 'create'])->name('inward.good.view');
    Route::post('good_inward', [TblPurchaseItemController::class, 'create'])->name('inward.good');
    Route::post('/get-invoice-details', [TblPurchaseItemController::class, 'getInvoiceDetails'])->name('invoice.details');
    Route::get('show_item-{invoice_no}', [TblPurchaseItemController::class, 'show_item'])->name(('show_item.details'));
    Route::get('search', [TblPurchaseController::class, 'filter'])->name('inward.search');  //View Item By Sr No.

    // Route::view('add_report', 'add_report')->name('report.add');
    Route::post('/stockReport', [ReportController::class, 'stockReport'])->name('report.stockReport');
    Route::get('report-stock', [ReportController::class, 'stock'])->name('report.stock');

    //get sub category wise sr no report list
    Route::post('/get-sc-sr-no', [ReportController::class, 'get_sc_sr_no'])->name('report.get_sc_sr_no');

    // Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('report', [ReportController::class, 'indexNew'])->name('report.index');
    Route::get('report-new', [ReportController::class, 'ReportNew'])->name('report.new');
    Route::get('report-create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report-store', [ReportController::class, 'store'])->name('report.store');
    Route::get('report-show-{report_id}', [ReportController::class, 'show'])->name(('report.show'));
    Route::get('report-type-show-{report_id}', [ReportController::class, 'typeshow'])->name(('report.type.show')); // type 15,18,21,26 wise record display
    Route::get('report-edit-{report_id}', [ReportController::class, 'edit'])->name(('report.edit'));
    // Route::put('report-update-{report_id}', [ReportController::class, 'update'])->name(('report.update'));
    // Route::put('report-update-{report_id}', [ReportController::class, 'Newupdate'])->name(('report.update'));
    Route::put('report-update-{report_id}', [ReportController::class, 'Latestupdate'])->name(('report.update'));
    Route::get('report-reject', [ReportController::class, 'reject'])->name(('report.reject'));
    Route::get('/report-search', [ReportController::class, 'search'])->name('report.search');
    Route::get('/report-ready', [ReportController::class, 'ready'])->name('report.ready');
    Route::post('/report-ready', [ReportController::class, 'ready'])->name('report.ready.update');
    Route::delete('/report-{sale_id}', [ReportController::class, 'destroy'])->name('report.destroy');
    
    Route::get('/serial-history', [SaleController::class, 'history'])->name('serial.history');

    // Section 
    Route::get('mainstore-section', [ReportController::class, 'mainstore'])->name('mainstore.section');
    Route::get('manufactur-section', [ReportController::class, 'manufactur'])->name('Manufactur.section');
    Route::get('repair-section', [ReportController::class, 'repair'])->name('Repair.section');
    Route::get('baddesk-section', [ReportController::class, 'baddesk'])->name('baddesk.section');
    Route::get('sell-section', [ReportController::class, 'sell'])->name('sell.section');

    Route::get('baddesk-create-{id}', [PermissionController::class, 'create'])->name('baddesk.create');
    Route::post('baddesk-store', [PermissionController::class, 'store'])->name('baddesk.store');
    
    // Sale Crud
    Route::get('sale-return-show-{sale_id}', [SaleController::class, 'return_show'])->name('sale.return.show');
    Route::get('sale-return-index', [SaleController::class, 'return_index'])->name('sale.return.index');
    Route::get('sale-return', [SaleController::class, 'return'])->name('sale.return');
    Route::post('sale-return-store', [SaleController::class, 'return_store'])->name('sale.return.store');
    Route::get('sale', [SaleController::class, 'index'])->name('sale.index');
    Route::get('sale-create', [SaleController::class, 'create'])->name('sale.create');
    Route::get('sale-repair-create', [SaleController::class, 'repaircreate'])->name('sale.repair.create');
    Route::post('sale-store', [SaleController::class, 'store'])->name('sale.store');
    Route::get('show-sale-{sale_id}', [SaleController::class, 'show'])->name(('sale.show'));
    Route::get('edit-sale-{sale_id}', [SaleController::class, 'edit'])->name(('sale.edit'));
    Route::put('/sale-{id}', [SaleController::class, 'update'])->name('sale.update');
    Route::delete('/sale-{sale_id}', [SaleController::class, 'destroy'])->name('sale.destroy');
    
    Route::get('/sale-convert-{sale_id}', [SaleController::class, 'edit'])->name('sale.convert');
    Route::get('/standby-return-{sale_id}', [SaleController::class, 'standby'])->name('standby.return');
    Route::put('/standby-return-store-{sale_id}', [SaleController::class, 'standbystore'])->name('standby.update');
    Route::get('/replacement-create', [SaleController::class, 'replacement'])->name('replacement.create');
    Route::get('/replacement-item-{id}', [SaleController::class, 'ItemReplacement'])->name('item-replacement');
    Route::post('/replacement-store', [SaleController::class, 'replacementstore'])->name('item-replacement.store');
    
    Route::post('/get-invoice-sell-details', [SaleController::class, 'getInvoiceDetails'])->name('invoice.sell.details');

    // invoice to tbl stock 
    Route::get('add_sr_no', [TblPurchaseController::class, 'add_sr_no'])->name('add_sr_no');
    Route::post('add_sr_no_store', [TblStockController::class, 'store'])->name('add_sr_no_store');
    
    Route::get('sr-no-stock', [TblStockController::class, 'sr_no'])->name('sr_no.index');
    Route::post('update-status', [TblStockController::class, 'update'])->name('update.status');

    // Customer Crud
    Route::get('customer-create', [TblCustomerController::class, 'create'])->name('customer.create');
    Route::get('customer', [TblCustomerController::class, 'index'])->name('customer.index');
    Route::post('customer-store', [TblCustomerController::class, 'store'])->name('customer.store');
    Route::get('edit-customer-{customer_id}', [TblCustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer-{id}', [TblCustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer-{customer_id}', [TblCustomerController::class, 'destroy'])->name('customer.destroy');

    // gst-pdf crud
    Route::get('/gst-pdf', [GstPdfTableController::class, 'index'])->name('gst-pdf.index');
    Route::get('gst-pdf-create', [GstPdfTableController::class, 'create'])->name('gst-pdf.create');
    Route::post('gst-pdf-store', [GstPdfTableController::class, 'store'])->name('gst-pdf.store');
    Route::delete('gst-pdf-delete-{id}', [GstPdfTableController::class, 'destroy'])->name('gst-pdf.delete');
    Route::get('edit-gst-pdf-{id}', [GstPdfTableController::class, 'edit'])->name('gst-pdf.edit');
    Route::put('gst-pdf/{id}', [GstPdfTableController::class, 'update'])->name('gst-pdf.update');
    Route::get('gst-pdf-show-{id}', [GstPdfTableController::class, 'show'])->name(('gst-pdf.show'));

    // Route::prefix('layouts')->name('layouts.')->group(function () {
        Route::get('layouts', [ManufactureReportLayoutController::class, 'index'])->name('layouts.index');
        Route::get('layouts-create', [ManufactureReportLayoutController::class, 'create'])->name('layouts.create');
        Route::post('/layouts', [ManufactureReportLayoutController::class, 'store'])->name('layouts.store');
        Route::get('layouts-{id}-edit', [ManufactureReportLayoutController::class, 'edit'])->name('layouts.edit');
        Route::put('layouts-{id}', [ManufactureReportLayoutController::class, 'update'])->name('layouts.update');
        Route::get('layouts-preview-{id}', [ManufactureReportLayoutController::class, 'show'])->name('layouts.show');
        Route::delete('layouts-{id}', [ManufactureReportLayoutController::class, 'destroy'])->name('layouts.destroy');
    // });
});

Route::get('/unauthorized', function () {
    return view('unauthorized');
});
