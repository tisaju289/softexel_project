<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RolePermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';



Route::get('/', [ProductController::class, 'landingPage']);












Route::get('/categoryListPage', [CategoryController::class, 'CategoryListPage'])->name('category.page');

Route::get('/categoryCreatePage', [CategoryController::class, 'CategoryCreatePage'])->name('category.create.page');

Route::get('/categories/{id}/UpdatePage', [CategoryController::class, 'CategoryUpdatePage'])->name('category.update.page');

Route::post('/categoryCreate', [CategoryController::class, 'CategoryCreate'])->name('category.create');

Route::put('/categories/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

Route::delete('/categories/{id}', [CategoryController::class, 'CategoryDestroy'])->name('category.destroy');





Route::get('/subCategoryListPage', [SubcategoryController::class, 'SubCategoryListPage'])->name('subcategory.page');

Route::get('/subCategoryCreatePage', [SubcategoryController::class, 'SubCategoryCreatePage'])->name('subcategory.create.page');

Route::get('/subCategories/{id}/UpdatePage', [SubcategoryController::class, 'SubCategoryUpdatePage'])->name('subcategory.update.page');

Route::post('/subCategoryCreate', [SubcategoryController::class, 'SubCategoryCreate'])->name('subcategory.create');

Route::put('/subCategories/{id}', [SubcategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

Route::delete('/subCategories/{id}', [SubcategoryController::class, 'SubCategoryDestroy'])->name('subcategory.destroy');





















Route::get('/productListPage', [ProductController::class, 'ProductListPage'])->name('product.page');

Route::get('/productCreatePage', [ProductController::class, 'ProductCreatePage'])->name('product.create.page');

Route::get('/products/{id}/UpdatePage', [ProductController::class, 'ProductUpdatePage'])->name('product.update.page');

Route::post('/productCreate', [ProductController::class, 'ProductCreate'])->name('product.create');

Route::put('/products/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');

Route::delete('/products/{id}', [ProductController::class, 'ProductDestroy'])->name('product.destroy');







Route::middleware('auth')->group(function () {

Route::get('/transactionListPage', [TransactionController::class, 'TransactionListPage'])->name('transaction.page');

Route::get('/transactionCreatePage', [TransactionController::class, 'TransactionCreatePage'])->name('transaction.create.page');

Route::get('/transactions/{id}/UpdatePage', [TransactionController::class, 'TransactionUpdatePage'])->name('transaction.update.page');

Route::post('/transactionCreate', [TransactionController::class, 'TransactionCreate'])->name('transaction.create');

Route::put('/transactions/{id}', [TransactionController::class, 'TransactionUpdate'])->name('transaction.update');

Route::delete('/transactions/{id}', [TransactionController::class, 'TransactionDestroy'])->name('transaction.destroy');
});






Route::get('user-list', [UserController::class, 'UserListPage'])->name('user-list');
Route::get('/usres/{id}/assignRole', [UserController::class, 'UserAssignRoleEditPage'])->name('users-assign-role-edit');
Route::post('/usres/{id}/assignRole', [UserController::class, 'UserAssignRoleUpdate'])->name('users-assign-role-update');




//Role Pages Route
Route::get('/roles/{id}/permissions', [RolePermissionController::class, 'RolePermissionEditPage'])->name('roles-permissions-edit');


//Role API Route
Route::post('/roles/{id}/permissions', [RolePermissionController::class, 'RolePermissionUpdate'])->name('roles.permissions.update');







// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['permission:role create']], function () {
        Route::get('roleCreatePage', [RolePermissionController::class, 'RoleCreatePage'])->name('role-createPage');
        Route::put('role-create', [RolePermissionController::class, 'RoleCreate'])->name('role-store');
    // });

    // Route::group(['middleware' => ['permission:role update']], function () {
        Route::get('/roles/{id}/edit', [RolePermissionController::class, 'RoleEditPage'])->name('role-edit');
        Route::put('/roles/{id}', [RolePermissionController::class, 'RoleUpdate'])->name('role-update');
    // });

    // Route::group(['middleware' => ['permission:role delete']], function () {
        Route::delete('/roles/{id}', [RolePermissionController::class, 'RoleDestroy'])->name('role-destroy');
    // });
    Route::get('roleList', [RolePermissionController::class, 'RoleListPage'])->name('role-list');
// });






// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['permission:permission create']], function () {
        Route::get('permissionCreatePage', [RolePermissionController::class, 'PermissionCreatePage'])->name('permission-createPage');
        Route::put('permission-create', [RolePermissionController::class, 'PermissionCreate'])->name('permission-store');
    // });

    // Route::group(['middleware' => ['permission:permission update']], function () {
        Route::get('/permissions/{id}/edit', [RolePermissionController::class, 'PermissionEditPage'])->name('permission-edit');
        Route::put('/permissions/{id}', [RolePermissionController::class, 'PermissionUpdate'])->name('permission-update');
    // });

    // Route::group(['middleware' => ['permission:permission delete']], function () {
        Route::delete('/permissions/{id}', [RolePermissionController::class, 'PermissionDestroy'])->name('permission-destroy');
    // });
    Route::get('/permissions', [RolePermissionController::class, 'PermissionListPage'])->name('permission-list');
// });

