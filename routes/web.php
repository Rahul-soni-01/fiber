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

use Illuminate\Support\Facades\Hash;


Route::post('login', [TblUserController::class, 'login'])->name('login.post');
Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');
Route::get('logout', [TblUserController::class, 'logout'])->name('logout');


// Route::middleware(['auth', 'type:admin'])->group(function () {
    // });
    
    
    Route::middleware('auth')->group(function () {
        Route::post('/check_permission', [TblUserController::class, 'permission'])->name('check_permission');
        Route::post('/check_stock', [TblStockController::class, 'check_stock'])->name('check_stock');
        // Home Blade
        Route::get('/home', [TblUserController::class, 'show'] )->name('home');
        
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
        
        // departments Crud
        Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/departments-create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/departments-store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('edit-department{department_id}', [DepartmentController::class, 'edit'])->name(('departments.edit')); //View deparment By id.
        Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::delete('/departments{department_id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
        
        // Party Crud
        Route::get('party-create', [TblPartyController::class, 'create'])->name('party.create');
        Route::get('party', [TblPartyController::class, 'index'])->name('party.show');
        Route::post('party-store', [TblPartyController::class, 'store'])->name('party.store');
        Route::get('edit-party-{party_id}', [TblPartyController::class, 'edit'])->name(('party.edit'));
        Route::put('/party-{id}', [TblPartyController::class, 'update'])->name('party.update');
        Route::delete('/party-{party_id}', [TblPartyController::class, 'destroy'])->name('party.destroy');
        Route::get('search', [TblPartyController::class, 'search'])->name('party.search');

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
        
        // inward crud
        Route::get('inward', [TblPurchaseController::class, 'index'])->name('inward.index');
        Route::get('good_inward', [TblPurchaseController::class, 'create'])->name('inward.good.view');
        Route::post('good_inward', [TblPurchaseItemController::class, 'create'])->name('inward.good');
        Route::post('/get-invoice-details', [TblPurchaseItemController::class, 'getInvoiceDetails'])->name('invoice.details');
        Route::get('show_item-{invoice_no}', [TblPurchaseItemController::class, 'show_item'])->name(('show_item.details'));;  //View Item By Sr No.
        
        // Route::view('add_report', 'add_report')->name('report.add');
        
        Route::get('report', [ReportController::class, 'index'])->name('report.index');
        Route::get('report-create', [ReportController::class, 'create'])->name('report.create');
        Route::post('/report-store', [ReportController::class, 'store'])->name('report.store');
        Route::get('report-show-{report_id}', [ReportController::class, 'show'])->name(('report.show'));
        
       // invoice to tbl stock 
        Route::get('add_sr_no', [TblPurchaseController::class, 'add_sr_no'])->name('add_sr_no');
        Route::post('add_sr_no_store', [TblStockController::class, 'store'])->name('add_sr_no_store');
        
        // report crud
        // Route::get('report', [TblPurchaseController::class, 'index'])->name('report.index');
        // Route::get('report-create', [TblPurchaseController::class, 'create'])->name('report.create');

    });

Route::get('/unauthorized', function () {
    return view('unauthorized');
});
