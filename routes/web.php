<?php

use App\Http\Controllers\UserController;
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
    return 'users';
});

//USER

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('users/new', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

Route::get('users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.delete');

Route::get('users/{user}/city', [Usercontroller::class, 'showInfoIfUserIsOnMadrid'])
    ->name('users.get.city');

Route::get('users/{user}/allUsers', [Usercontroller::class, 'showAllUsersIfRolIsAdmin'])
->name('users.get.allUsers');