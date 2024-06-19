<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});
Route::get('/', function(){
    return redirect()->route('admin.login');
});
Route::get('admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login']);

Route::prefix('admin')-> middleware('auth')->group(function () {

  Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

  Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');;
  Route::get('/users/{id}/update-status', [UserController::class, 'updateStatus']);
  Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
  Route::post('/users', [UserController::class, 'store']);
  Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
  Route::put('/users/{id}', [UserController::class, 'update']);

  Route::get('activities', [ActivityController::class, 'index'])->name('admin.activities.index');
  Route::get('activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
  Route::post('activities', [ActivityController::class, 'store']);
  Route::get('activities/{id}/edit', [ActivityController::class, 'edit'])->name('admin.activities.edit');
  Route::put('activities/{id}', [ActivityController::class, 'update']);
  Route::delete('activities/{id}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');

  Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
  Route::get('reports/{id}/upload', [ReportController::class, 'upload'])->name('admin.reports.upload');
  Route::post('reports/{id}/upload', [ReportController::class, 'store']);
});


