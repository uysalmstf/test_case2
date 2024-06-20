<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Integration\IntegrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function(){

    Route::group(['prefix' => 'integration'], function () {
        Route::get('list', [IntegrationController::class, 'list'])->name('integration.list');
        Route::post('store', [IntegrationController::class, 'store'])->name('integration.store');
        Route::put('update/{id}', [IntegrationController::class, 'update'])->name('integration.edit');
        Route::delete('delete', [IntegrationController::class, 'delete'])->name('integration.del');
    });
});
