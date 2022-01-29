<?php

use App\Http\Controllers\WithJsonController;
use App\Http\Controllers\WithModelController;
use App\Http\Controllers\WithModelJsonController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'user' => new UserResource(new User),
    ]);
});

Route::get('without-inertia', function () {
    tenant_route();
});

Route::get('with-default-resource', function() {
    return JsonResource::make([
        'resource' => tenant_route(),
    ]);
});

Route::get('with-resource', WithJsonController::class);
Route::get('with-model', WithModelController::class);
Route::get('with-model-json', WithModelJsonController::class);
