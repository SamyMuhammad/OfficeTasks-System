<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function(){
    Route::get('/login','LoginController@showLoginForm')->name('login')->middleware('guest:admin');
    Route::post('/login','LoginController@login')->middleware('guest:admin');
    Route::post('/logout','LoginController@logout')->name('logout')->middleware('auth:admin');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('/', function () { return redirect()->route('admin.dashboard'); });
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::get('receipts/paid', '\App\Http\Controllers\ReceiptController@paid')->name('receipts.paid');
    Route::get('receipts/unpaid', '\App\Http\Controllers\ReceiptController@unpaid')->name('receipts.unpaid');
    Route::get('receipts/search', '\App\Http\Controllers\ReceiptController@search')->name('receipts.search');
    Route::resource('receipts.payments', '\App\Http\Controllers\ReceiptPaymentController')->shallow()->except(['show', 'create']);
    
    Route::resource('categories', CategoryController::class)->except(['show', 'create']);
    Route::resource('services', ServiceController::class)->except(['show', 'create']);
    Route::resource('task-statuses', TaskStatusController::class)->except(['show', 'create']);
    Route::resource('payment-methods', PaymentMethodController::class)->except(['show', 'create']);
    Route::resource('expense-types', ExpenseTypeController::class)->except(['show', 'create']);
    Route::resource('settings', SettingController::class)->only(['index', 'edit', 'update']);
    Route::resources([
        'admins' => AdminController::class,
        'users' => UserController::class,
        'clients' => ClientController::class,
        'receipts' => '\App\Http\Controllers\ReceiptController',
        'tasks' => TaskController::class,
    ]);
});