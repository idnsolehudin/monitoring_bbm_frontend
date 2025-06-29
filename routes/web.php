<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\EnsureTokenIsValid;


Route::get('/login', function() {
    return view('auth.login', ['title' => 'Login']);
})->name('login');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware([
    EnsureTokenIsValid::class
    ])->group(function () {
    Route::get('/', function () {
        return view('reports/show_daily');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    #halaman menu deliveryman
    Route::get('/deliveryman/{id}', [UserController::class, 'deliveryman'])->name('menu.deliveryman');


    #fitur report
    Route::get('/show.daily.reports', function () {
        return view('reports/show_daily');
    })->name('show.daily.reports');
    Route::get('/currentreports', [ReportController::class, 'show'])->name('show.currentreports');
    Route::get('/reports', [ReportController::class, 'index'])->name('show.reports');
    Route::get('/reportsperdate', [ReportController::class, 'showperdate'])->name('show.reportsperdate');
    Route::get('/datareportsperdate', [ReportController::class, 'showdataperdate'])->name('show.datareportsperdate');
    Route::get('/detailReport/{id}', [ReportController::class, 'detail'])->name('detail.report');
    Route::get('/editReport/{id}', [ReportController::class, 'edit'])->name('edit.report');
    Route::delete('/destroyReport/{id}', [ReportController::class, 'destroy'])->name('destroy.report');
    Route::get('/filtered_reports', [ReportController::class, 'formFilteredReports'])->name('form.filtered.reports');
    Route::get('/get_reports_per_date', [ReportController::class, 'getFilteredReports'])->name('get.filtered.reports');
    Route::get('/create_reports', [ReportController::class, 'create'])->name('form.create.reports');
    Route::post('/store_reports', [ReportController::class, 'store'])->name('store.reports');
    Route::get('/show_user_reports/{id}', [ReportController::class, 'userReports'])->name('user.reports');
   
    #fitur kelola data  vehicle
    Route::get('/vehicle', [VehicleController::class, 'index'])->name('show.vehicle');
    Route::get('/vehicle/{id}/detail', [VehicleController::class, 'detail'])->name('detail.vehicle');
    Route::get('/editvehicle/{id}/edit', [VehicleController::class, 'edit'])->name('edit.vehicle');
    Route::delete('/vehicledelete/{id}', [VehicleController::class, 'destroy'])->name('delete.vehicle');
    Route::get('/createvehicle', [VehicleController::class, 'create'])->name('create.vehicle');
    Route::post('/storevehicle', [VehicleController::class, 'store'])->name('store.vehicle');
    Route::put('/updatevehicle/{id}', [VehicleController::class, 'update'])->name('update.vehicle');
    
    #fitur kelola data vehicle type
    Route::get('/vehicletype', [VehicleTypeController::class, 'index'])->name('show.vehicletype');
    Route::get('/vehicletype/{id}/detail', [VehicleTypeController::class, 'detail'])->name('detail.vehicletype');
    Route::get('/vehicletype/{id}/edit', [VehicleTypeController::class, 'edit'])->name('edit.vehicletype');
    Route::get('/createvehicletype', [VehicleTypeController::class, 'create'])->name('create.vehicletype');
    Route::post('/createvehicletype', [VehicleTypeController::class, 'store'])->name('store.vehicletype');
    Route::put('/updatevehicletype/{id}', [VehicleTypeController::class, 'update'])->name('update.vehicletype');
    Route::delete('vehicletype/{id}/delete', [VehicleTypeController::class, 'destroy'])->name('delete.vehicletype');
    
    #fitur kelola data user
    Route::get('/users', [UserController::class, 'index'])->name('show.user');
    Route::get('/users/{id}', [UserController::class, 'detail'])->name('detail.user');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('edit.user');
    Route::get('/profil/{id}/edit', [UserController::class, 'editprofil'])->name('edit.profil');
    Route::get('/create/users', [UserController::class, 'create'])->name('create.user');
    Route::post('/store/users', [UserController::class, 'store'])->name('store.user');
    Route::delete('users/{id}/delete', [UserController::class, 'destroy'])->name('delete.user');
    Route::put('users/{id}/update', [UserController::class, 'update'])->name('update.user');
    Route::put('profil/{id}/update', [UserController::class, 'updateprofil'])->name('update.profil');
    
    #fitur kelola data rute
    Route::get('/route', [RouteController::class, 'index'])->name('show.route');
    Route::get('/route/{id}/detail', [RouteController::class, 'detail'])->name('detail.route');
    Route::get('/route/{id}/edit', [RouteController::class, 'edit'])->name('edit.route');
    Route::get('/create/route', [RouteController::class, 'create'])->name('create.route');
    Route::post('/store/route', [RouteController::class, 'store'])->name('store.route');
    Route::delete('route/{id}/delete', [RouteController::class, 'destroy'])->name('delete.route');
    Route::put('updateroute/{id}', [RouteController::class, 'update'])->name('update.route');
});





