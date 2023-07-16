<?php

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use app\Driver;
use App\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class)->middleware(['role:' . Role::ROLE_OWNER]);
    Route::resource('driver', DriverController::class)->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::resource('vehicle', VehicleController::class)->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::get('loan/pending', 'LoanController@pendingLoan')->name('loan.pendingLoan')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::get('loan/approved', 'LoanController@index')->name('loan.index');
    Route::get('loan/rejected', 'LoanController@rejectedLoan')->name('loan.rejectedLoan');
    Route::get('loan/create', 'LoanController@create')->name('loan.create')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::post('loan/store', 'LoanController@store')->name('loan.store')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::delete('loan/destroy/{id}', 'LoanController@destroy')->name('loan.destroy')->middleware(['role:' . Role::ROLE_ADMIN]);
    Route::get('loan/owner/pending', 'LoanController@indexOwner')->name('loan.indexOwner')->middleware(['role:' . Role::ROLE_OWNER]);
    Route::get('loan/edit/{id}', 'LoanController@edit')->name('loan.edit')->middleware(['role:' . Role::ROLE_OWNER]);
    Route::put('loan/update/{id}', 'LoanController@update')->name('loan.update')->middleware(['role:' . Role::ROLE_OWNER]);
    Route::get('loan/export', 'LoanController@export')->name('loan.export');
});
