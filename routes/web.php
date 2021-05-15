<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ImportsController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\PaidSalaryController;
use App\Http\Controllers\ReceiptPaymentController;

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
Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::post('receipts/clients', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('receipts.clients.store');
    Route::get('receipts/paid', [ReceiptController::class, 'paid'])->name('receipts.paid');
    Route::get('receipts/unpaid', [ReceiptController::class, 'unpaid'])->name('receipts.unpaid');
    Route::get('receipts/search', [ReceiptController::class, 'search'])->name('receipts.search');
    
    Route::get('imports', [ImportsController::class, 'index'])->name('imports.index');

    Route::get('tasks/category-tasks', [TaskController::class, 'categoryTasks'])->name('tasks.categoryTasks');
    Route::get('tasks/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.myTasks');
    Route::patch('tasks/{task}/change-status', [TaskController::class, 'changeStatus'])->name('tasks.changeStatus');
    Route::post('tasks/{task}/accept', [TaskController::class, 'accept'])->name('tasks.accept');
    Route::get('tasks/{task}', '\App\Http\Controllers\Admin\TaskController@show')->name('tasks.show');
    
    Route::resource('receipts.payments', ReceiptPaymentController::class)->shallow()->except(['show', 'create']);
    Route::resource('paid-salaries', PaidSalaryController::class)->except('show');
    Route::resource('bonuses', BonusController::class)->except('show');
    Route::resource('expenses', ExpenseController::class)->except('show');
    Route::resources([
        'receipts' => ReceiptController::class,
    ]);
});

Route::get('clear_cache', function () {
    $x = Artisan::call('cache:clear');
    $x = Artisan::call('view:clear');
    $x = Artisan::call('config:clear');
    $x = Artisan::call('config:cache');
    return "Cleared!";
});
Route::get('_migrate', function(){
    $exitCode = Artisan::call('migrate:fresh', ['--seed' => true]);
    return "Migrated!";
});

Route::get('_route', function () {
    $closing = Carbon\Carbon::create('2021-05-12');
    $activation = Carbon\Carbon::create('2021-04-12');
    $diff = $closing->diffInDays($activation);
    dd($closing, $activation, $diff);
});