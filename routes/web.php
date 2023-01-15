<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});



//Start:: Maintenance Mode
Route::get('maintenance-mode-changes', [SettingController::class, 'maintenanceMode'])->name('maintenance');
Route::post('maintenance-mode-changes', [SettingController::class, 'maintenanceModeChange'])->name('maintenance.change');
//End:: Maintenance Mode

//Migrate, Cache
Route::get('cache-settings', [SettingController::class, 'cacheSettings'])->name('cache-settings');
Route::get('cache-update/{id}', [SettingController::class, 'cacheUpdate'])->name('cache-update');
Route::get('migrate-settings', [SettingController::class, 'migrateSettings'])->name('migrate-settings');
Route::get('migrate-update', [SettingController::class, 'migrateUpdate'])->name('migrate-update');


Route::get('migrate', function () {
    Artisan::call('migrate');
    return redirect()->back();
});

