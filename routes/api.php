<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateursController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('utilisateur',UtilisateursController::class);
Route::post('utilisateur/create/user',[UtilisateursController::class, 'store']);
Route::put('utilisateur/edit/{id}',[UtilisateursController::class, 'update']);
Route::delete('utilisateur/delete/{id}',[UtilisateursController::class, 'destroy']);
