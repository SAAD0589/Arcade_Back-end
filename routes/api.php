<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\gamesController;
use App\Models\Game;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);  
});
Route::get('/games',function(){
    $data=Game::all();
    return $data;
}); 



Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/loginAdmine', [AdminAuthController::class, 'login']);
    Route::post('/registerAdmine', [AdminAuthController::class, 'register']);
    Route::post('/logoutAdmine', [AdminAuthController::class, 'logout']);
    Route::post('/refreshAdmine', [AdminAuthController::class, 'refresh']);
});