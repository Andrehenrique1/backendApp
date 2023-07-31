<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\User\UserController;
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

// Rota para exibir o formulário de login para clientes
Route::get('login/customers', [CustomerController::class, 'showCustomerLoginForm'])->name('login.customers');

// Rota para processar o login para clientes
Route::post('login/customers', [CustomerController::class, 'login']);

// Rota para exibir o formulário de registro para clientes
Route::get('register/customers', [App\Http\Controllers\Auth\RegisterController::class, 'showCustomerRegistrationForm'])->name('register.customers');

// Rota para processar o registro para clientes
Route::post('register/customers', [CustomerController::class, 'storeOrUpdate']);

// Rota para exibir o formulário de login para prestadores de serviços
Route::get('login/service-providers', [App\Http\Controllers\Auth\LoginController::class, 'showServiceProviderLoginForm'])->name('login.service-providers');

// Rota para processar o login para prestadores de serviços
Route::post('login/users', [UserController::class, 'login']);

// Rota para exibir o formulário de registro para prestadores de serviços
Route::post('register/user', [UserController::class, 'storeOrUpdate']);

// Rota para processar o registro para prestadores de serviços
Route::post('register/service-providers', [App\Http\Controllers\Auth\RegisterController::class, 'createServiceProvider']);

