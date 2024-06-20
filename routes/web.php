<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ActivityController as UserActivityController;
use App\Http\Controllers\User\ReportController as UserReportController;

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
  return redirect()->route('user.login');
});

Route::get('/login', [UserAuthController::class, 'index'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login']);

Route::middleware('auth', 'role:user')->group(function () {
  Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
  
  Route::get('activities', [UserActivityController::class, 'index']);
  
  Route::get('report', [UserReportController::class, 'index'])->name('user.report.index');
  Route::post('report/{id}/upload', [UserReportController::class, 'upload']);

  Route::get('logout', [UserAuthController::class, 'logout'])->name('user.logout');
});




Route::get('/admin', function(){
    return redirect()->route('admin.login');
});
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {

  Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

  Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');;
  Route::get('/users/{id}/update-status', [AdminUserController::class, 'updateStatus']);
  Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
  Route::post('/users', [AdminUserController::class, 'store']);
  Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
  Route::put('/users/{id}', [AdminUserController::class, 'update']);

  Route::get('activities', [AdminActivityController::class, 'index'])->name('admin.activities.index');
  Route::get('activities/create', [AdminActivityController::class, 'create'])->name('admin.activities.create');
  Route::post('activities', [AdminActivityController::class, 'store']);
  Route::get('activities/{id}/edit', [AdminActivityController::class, 'edit'])->name('admin.activities.edit');
  Route::put('activities/{id}', [AdminActivityController::class, 'update']);
  Route::delete('activities/{id}', [AdminActivityController::class, 'destroy'])->name('admin.activities.destroy');

  Route::get('reports', [AdminReportController::class, 'index'])->name('admin.reports.index');
  Route::get('reports/{id}/upload', [AdminReportController::class, 'upload'])->name('admin.reports.upload');
  Route::post('reports/{id}/upload', [AdminReportController::class, 'store']);
});


