<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Products;
use App\Models\Cart;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/login', 'processLogin')->name('processLogin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        // ADMIN PAGE
        Route::middleware(['auth', 'role:Administrator'])->group(function () {
        // Admin routes
        Route::get('/admin/dashboard', 'adminDashboard')->name('posAdminDashboard.dashboard');
        Route::get('/admin/profile', 'showProfile')->name('profile');
        Route::get('/admin/products', 'adminProducts')->name('posAdminDashboard.products');
        Route::get('/products/create', 'createProduct')->name('products.createProduct');
        Route::get('/products/{product}', 'showProduct')->name('products.showProduct');
        Route::get('/products/{product}/edit', 'editProduct')->name('products.editProduct');
        Route::get('/admin/products/print', 'fetchAllProductsforAdmin')->name('fetchAllProductsforAdmin');
        Route::get('/admin/users', 'adminUsersNew')->name('admin-users');
        Route::get('/users/create', 'createUser')->name('users.createUser');
        Route::get('/admin/{id}', 'showUserforAdmin')->name('showUserforAdmin');
        Route::get('/users/{id}/edit', 'editUser')->name('users.editUser');
        Route::get('/admin/records/print', 'fetchAllUsersforAdmin')->name('fetchAllUsersforAdmin');
        // Route::get('/admin/statistics', 'adminStatistics')->name('admin.statistics');
        Route::get('/admin/view/statistics', 'adminStatistics')->name('admin.statistics');
        // Route::get('/admin/transactions', 'adminTransactions')->name('admin.transactions');
        Route::get('/admin/view/transactions', 'adminTransactions')->name('admin.transactions');
        Route::post('/profile/picture', 'updatePicture')->name('profile.updatePicture');
        Route::post('/profile/password', 'updatePassword')->name('profile.updatePassword');
        Route::post('/products', 'storeProduct')->name('products.storeProduct');
        Route::post('/users', 'storeUser')->name('users.storeUser');
        Route::put('/products/{product}', 'updateProduct')->name('products.updateProduct');
        Route::put('/users/{id}', 'updateUser')->name('users.updateUser');
        Route::delete('/products/{product}', 'destroyProduct')->name('products.destroyProduct');
        Route::delete('/users/{id}', 'destroyUser')->name('users.destroyUser');
        });

        Route::middleware(['auth', 'role:User/Employee'])->group(function () {
        // User routes
        Route::get('/user/dashboard', 'userDashboard')->name('posUserDashboard.dashboard');
        Route::get('/user/profile', 'showProfileforUsers')->name('showProfileforUsers');
        Route::get('/user/products', 'userProducts')->name('posUserDashboard.products');
        Route::get('/users/products/print', 'fetchAllProductsforUsers')->name('fetchAllProductsforUsers');
        Route::get('/user/receipt/{transaction_id}', 'userReceipt')->name('receipt');
        Route::get('/user/records', 'userRecords')->name('posUserDashboard.records');
        Route::get('/users/{id}', 'showUserforUsers')->name('users.showUserforUsers');
        Route::get('/users/records/print', 'fetchAllUsersforUsers')->name('fetchAllUsersforUsers');
        Route::get('/user/statistics', 'userStatistics')->name('posUserDashboard.statistics');
        Route::get('/user/transactions', 'userTransactions')->name('posUserDashboard.transactions');
        Route::post('/user/profile/picture', 'updatePictureforUsers')->name('updatePictureforUsers');
        Route::post('/user/profile/password', 'updatePasswordforUsers')->name('updatePasswordforUsers');
        Route::post('/add-to-cart', 'addToCart')->name('add-to-cart');
        Route::post('/remove-from-cart/{id}', 'decreaseProduct')->name('decreaseProduct');
        Route::post('/add-to-cart/{id}', 'increaseProduct')->name('increaseProduct');
        Route::post('/bulk-remove-from-cart', 'bulkRemoveFromCart')->name('bulk-remove-from-cart');
        Route::post('/calculate-receipt', 'calculateReceipt')->name('calculate-receipt');
        Route::post('/process-receipt', 'processReceipt')->name('process-receipt');
        });

    });
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('/', 'login')->name('login');
//     Route::post('/login', 'processLogin')->name('processLogin');
//     Route::post('/logout', 'logout')->name('logout');
// });

// Route::controller(UserController::class)->group(function () {
// // ADMIN PAGE
// // Admin dashboard
// Route::get('/admin/dashboard', 'adminDashboard')->name('posAdminDashboard.dashboard');
// // Products table
// Route::get('/admin/products', 'adminProducts')->name('posAdminDashboard.products');
// // Redirect to add product form
// Route::get('/products/create', 'createProduct')->name('products.createProduct');
// // Show specific product
// Route::get('/products/{product}', 'showProduct')->name('products.showProduct');
// // Redirect to edit product form
// Route::get('/products/{product}/edit', 'editProduct')->name('products.editProduct');
// // Print product record
// Route::get('/admin/products/print', 'fetchAllProducts')->name('products.fetchAll');
// // Users table
// Route::get('/admin/records', 'adminRecords')->name('posAdminDashboard.records');
// // Redirect to add user form
// Route::get('/users/create', 'createUser')->name('users.createUser');
// // Show specific user
// Route::get('/users/{id}', 'showUser')->name('users.showUser');
// // Redirect to edit user page
// Route::get('/users/{id}/edit', 'editUser')->name('users.editUser');
// // Print user record
// Route::get('/admin/records/print', 'fetchAllUsers')->name('users.fetchAll');
// // Statistics page
// Route::get('/admin/statistics', 'adminStatistics')->name('admin.statistics');
// // Transaction page
// Route::get('/admin/transactions', 'adminTransactions')->name('admin.transactions');

// // Add new product
// Route::post('/products', 'storeProduct')->name('products.storeProduct');
// // Add new user
// Route::post('/users', 'storeUser')->name('users.storeUser');

// // Update product data
// Route::put('/products/{product}', 'updateProduct')->name('products.updateProduct');
// // Update user data
// Route::put('/users/{id}', 'updateUser')->name('users.updateUser');

// // Delete product
// Route::delete('/products/{product}', 'destroyProduct')->name('products.destroyProduct');
// // Delete user
// Route::delete('/users/{id}', 'destroyUser')->name('users.destroyUser');

// // USER PAGE
// // User Dashboard
// Route::get('/user/dashboard', 'userDashboard')->name('posUserDashboard.dashboard');
// // Products table
// Route::get('/user/products', 'userProducts')->name('posUserDashboard.products');
// // Receipt page
// Route::get('/user/receipt/{transaction_id}', 'userReceipt')->name('receipt');
// // Users table
// Route::get('/user/records', 'userRecords')->name('posUserDashboard.records');
// // Statistics page
// Route::get('/user/statistics', 'userStatistics')->name('posUserDashboard.statistics');
// // Transactions page
// Route::get('/user/transactions', 'userTransactions')->name('posUserDashboard.transactions');

// // Add product to cart
// Route::post('/add-to-cart', 'addToCart')->name('add-to-cart');
// // Decrease product quantity
// Route::post('/remove-from-cart/{id}', 'decreaseProduct')->name('decreaseProduct');
// // Increase product quantity
// Route::post('/add-to-cart/{id}', 'increaseProduct')->name('increaseProduct');
// // Remove selected product from cart
// Route::post('/bulk-remove-from-cart', 'bulkRemoveFromCart')->name('bulk-remove-from-cart');
// // Calculate receipt for printing
// Route::post('/calculate-receipt', 'calculateReceipt')->name('calculate-receipt');
// // Print receipt
// Route::post('/process-receipt', 'processReceipt')->name('process-receipt');
// });