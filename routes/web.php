<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartynameController;
use App\Http\Controllers\InwardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddController;
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

use Illuminate\Support\Facades\Hash;



// Route::get('/', function () {
//     return view('welcome'); 
// });

Route::post('login', [TblUserController::class, 'login']);
Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');
Route::get('logout', [TblUserController::class, 'logout'])->name('logout');


// Route::middleware(['auth', 'type:admin'])->group(function () {
    Route::get('_add_party_', [TblPartyController::class, 'index'])->name('party.add.view');
// });

Route::post('/check_permission', [TblUserController::class, 'permission'])->name('check_permission');

Route::middleware('auth')->group(function () {
    Route::get('/home', [TblUserController::class, 'index'] )->name('home');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/add', [PermissionController::class, 'create'])->name('permissions.add');
    Route::get('/manage-permissions', [ManagePermissionController::class, 'index'])->name('manage.permissions');
    Route::get('/manage-permissions-departments-{id}', [ManagePermissionController::class, 'edit'])->name('managePermissions.departments');
    Route::post('/manage-permissions-update-{id}', [ManagePermissionController::class, 'update'])->name('manage-permissions.update');
    
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments-create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments-store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('/departments{department_id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    // Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::get('edit-department{department_id}', [DepartmentController::class, 'edit'])->name(('departments.edit')); //View deparment By id.
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');

        /*  Route::post('addparty', [TblPartyController::class, 'create']); 
        Route::post('addcategory', [TblCategoryController::class, 'create']);  
        Route::post('addsubcategory', [TblSubCategoryController::class, 'create'])->name('subcategory.store');
        Route::view('add_report', 'add_report'); 
        Route::post('good_inward', [TblPurchaseItemController::class, 'create']); 

        Route::view('add_party', 'add_party'); 
        Route::get('add_category', [TblCategoryController::class,'show']);  
        Route::get('party', [TblPartyController::class,'show']); 
        Route::get('search', [TblPartyController::class,'search']);  
        Route::get('inward', [TblPurchaseController::class,'show']);  
        Route::get('category', [TblSubCategoryController::class,'show_category']);  
        Route::get('good_inward', [TblPartyController::class,'view']);  
        Route::get('search', [TblPurchaseController::class,'filter']); 
        Route::get('add_sr_no', [TblPurchaseController::class, 'add_sr_no'])->name('add_sr_no');
        Route::post('/get-invoice-details', [TblPurchaseItemController::class, 'getInvoiceDetails'])->name('invoice.details');
        Route::post('add_sr_no_store', [TblStockController::class, 'store'])->name('add_sr_no_store');*/
        // Admin routes


        // Route::middleware(['type:admin'])->group(function () {
        Route::post('addparty', [TblPartyController::class, 'create'])->name('party.add');
        Route::post('addcategory', [TblCategoryController::class, 'create'])->name('category.add');
        Route::post('addsubcategory', [TblSubCategoryController::class, 'create'])->name('subcategory.store');
        Route::view('add_report', 'add_report')->name('report.add');
        Route::post('good_inward', [TblPurchaseItemController::class, 'create'])->name('inward.good');
    // });
   
    // Moderator routes
    // Route::middleware(['type:moderator'])->group(function () {
        // Route::view('add_party', 'add_party')->name('party.add.view');
        Route::get('party', [TblPartyController::class, 'show'])->name('party.show');
        Route::get('inward', [TblPurchaseController::class, 'show'])->name('inward.show');
        Route::get('good_inward', [TblPartyController::class, 'view'])->name('inward.good.view');
        Route::get('add_category', [TblCategoryController::class, 'show'])->name('category.show');
    // });
    
    // User routes
    // Route::middleware(['type:user'])->group(function () {
     Route::get('search', [TblPartyController::class, 'search'])->name('party.search');
        Route::get('category', [TblSubCategoryController::class, 'show_category'])->name('category.show');

    // });

    Route::get('show_item-{invoice_no}', [TblPurchaseItemController::class, 'show_item'])->name(('show_item.details'));;  //View Item By Sr No.
    Route::get('add_sr_no', [TblPurchaseController::class, 'add_sr_no'])->name('add_sr_no');
    Route::post('/get-invoice-details', [TblPurchaseItemController::class, 'getInvoiceDetails'])->name('invoice.details');
    Route::post('add_sr_no_store', [TblStockController::class, 'store'])->name('add_sr_no_store');

   

});

Route::get('/unauthorized', function () {
    return view('unauthorized');
});
