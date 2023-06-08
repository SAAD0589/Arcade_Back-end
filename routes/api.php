<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\gamesController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DowController;
use App\Http\Controllers\favController;
use App\Http\Controllers\RequirementController;
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

Route::get('/games',[gamesController::class,'index']); 
Route::get('/allGames',[gamesController::class,'allgames']); 
Route::get('/Requirement',[RequirementController::class,'index']); 
Route::post('/Requirement/save',[RequirementController::class,'store']); 
Route::get('/Categorie',[CategorieController::class,'index']); 
Route::post('/Categorie/save',[CategorieController::class,'store']); 

Route::get('/users',[UserController::class,'index']); 
Route::post('/download',[DowController::class,'create']);
Route::post('/fav',[favController::class,'create']);
Route::get('/fav',[favController::class,'index']);
Route::post('/favg',[favController::class,'show']);
Route::post('/favd',[favController::class,'delete']);
Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/loginAdmine', [AdminAuthController::class, 'login']);
    Route::post('/registerAdmine', [AdminAuthController::class, 'register']);
    Route::post('/logoutAdmine', [AdminAuthController::class, 'logout']);
    Route::post('/refreshAdmine', [AdminAuthController::class, 'refresh']);
});
//------------------------------crud Routes-------------------------------------------------------
//Games : 
Route::get('/games',[gamesController::class,'index']); 
Route::post('/Game/save',[gamesController::class, 'store']);
    
Route::put('/Game/update/{id_game}',[gamesController::class, 'update']);
 
Route::delete('/Game/delete/{id_game}',[gamesController::class, 'destroy']);
 
 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//users : 
Route::get('/User',[UserController::class, 'index']);
Route::delete('/User/delete/{id_user}',[UserController::class, 'destroy']);
 
 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
