<?php

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
    return view('auth.login');
});



Route::middleware('auth')->group(function (){
	Route::get('/analytic',[App\Http\Controllers\AnalyticController::class,'index'])->name('analytic');
	Route::resource('company',App\Http\Controllers\CompanyController::class);
	Route::resource('error',App\Http\Controllers\ErrorController::class);
	Route::resource('user',App\Http\Controllers\UserController::class);
	Route::get('/city', [App\Http\Controllers\HomeController::class, 'index'])->name('city');
	Route::get('/city/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('city.edit');
	Route::delete('/delete', [App\Http\Controllers\HomeController::class, 'destroy'])->name('city.destroy');
	Route::post('/update', [App\Http\Controllers\HomeController::class, 'update'])->name('city.update');
	Route::get('/city/home', [App\Http\Controllers\HomeController::class, 'home'])->name('city.index');
	Route::post('/city', [App\Http\Controllers\HomeController::class, 'store'])->name('city.store');
	Route::get('/device',[App\Http\Controllers\DeviceController::class,'index'])->name('device');
	Route::get('/device/create',[App\Http\Controllers\DeviceController::class,'create'])->name('device.create');
	Route::get('/device/{id}/edit',[App\Http\Controllers\DeviceController::class,'edit'])->name('device.edit');
	Route::post('/device/create',[App\Http\Controllers\DeviceController::class,'store'])->name('device.store');
	Route::post('/device/update',[App\Http\Controllers\DeviceController::class,'update'])->name('device.update');
	Route::get('/city/create',[App\Http\Controllers\HomeController::class,'create'])->name('city.create');
	Route::get('/device/{slug}',[App\Http\Controllers\DeviceController::class,'innerCity'])->name('device.inner.city');
	Route::get('/device/find/{id}',[App\Http\Controllers\DeviceController::class,'innerDevice'])->name('device.inner');
});




Auth::routes([
	'register'=>false,
	'logout'=>false,

]);
Route::get('logout', function ()
{
	auth()->logout();
	Session()->flush();
	
	return redirect('/');
})->name('logout');
