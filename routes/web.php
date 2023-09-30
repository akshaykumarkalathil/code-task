<?php

use App\Http\Controllers\UserDetails;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/user/{id}', function ($id) {
    $controller = new UserDetails();
    return app()->call([$controller, 'getUserById'], ['id' => $id]);
});

Route::get('/paginatedUserList/{id}', function ($id) {
    $controller = new UserDetails();
    return app()->call([$controller, 'paginatedUserList'], ['id' => $id]);
});

Route::match(['POST'], '/createNewUser', [UserDetails::class, 'createNewUser']);
