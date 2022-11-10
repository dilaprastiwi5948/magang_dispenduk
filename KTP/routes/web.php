<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ExplanationTypeController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\ReportingController;
use App\Http\Controllers\Admin\ReportingTypeController;
use App\Http\Controllers\Admin\SubmissionTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\ReportingController as OperatorReportingController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function() {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('operator')->name('operator.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::resource('/reporting', OperatorReportingController::class);
    Route::get('search', [SearchController::class, 'index'])->name('search.index');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminDashboard::class, 'profile'])->name('profile');
    Route::resource('/reportingtypes', ReportingTypeController::class)->except('show');
    Route::resource('/submissiontypes', SubmissionTypeController::class)->except('show');
    Route::resource('/explanationtypes', ExplanationTypeController::class)->except('show');
    Route::resource('/reporting', ReportingController::class);
    Route::resource('/operator', OperatorController::class)->except('show');

    Route::get('report/dailyreport', [DailyReportController::class, 'index'])->name('report.dailyreport');
    Route::get('report/dailyreport/print', [DailyReportController::class, 'print'])->name('report.dailyreport.print');
    Route::get('search', [SearchController::class, 'index'])->name('search.index');
});
