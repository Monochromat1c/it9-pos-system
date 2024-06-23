<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Log In
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/user/process/login', 'processLogin');
});

Route::group(['middleware' => 'auth'], function () {
    // ROUTES FOR GENDER
    Route::controller(GenderController::class)->group(function () {
// Open the gender form
        Route::get('/gender/add', 'adddNewGender')->name('gender.addNewGender');
// Open gender table
        Route::get('/genders', 'gender')->name('gender.gender');
// View specific gender
        Route::get('/gender/show/{id}', 'show')->name('gender.show');
// Edit specific gender (Form)
        Route::get('/gender/edit/{id}', 'edit')->name('gender.edit');
        // Delete specific  gender (Confirmation)
        Route::get('/gender/delete/{id}', 'delete')->name('gender.delete');

// Add gender to the database
        Route::post('/gender/add', 'creategender');
// Update the gender you want to edit
        Route::put('/gender/update/{gender}', 'update')->name('gender.update');

// Delete specific gender
        Route::delete('/gender/destroy/{gender}', 'destroy')->name('gender.destroy');
    });

// ROUTES FOR USER
    Route::controller(UserController::class)->group(function () {
        // Open user form
        Route::get('/user/add', 'addNewUser')->name('user.addNewUser');
        // Open user table
        Route::get('/users', 'user')->name('user.user');
        // View specific user
        Route::get('/user/show/{id}', 'show')->name('user.show');
        // Edit specific gender (Form)
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        // Delete specific  gender (Confirmation)
        Route::get('/user/delete/{id}', 'delete')->name('user.delete');
        // Log out
        Route::get('/user/process/logout', 'logout')->name('logout');

        // Add user to database
        Route::post('/user/add', 'insertUser');
        // Update the gender you want to edit
        Route::put('/user/update/{user}', 'update')->name('user.update');
        // Delete specific gender
        Route::delete('/user/destroy/{user}', 'destroy')->name('user.destroy');
    });
});
