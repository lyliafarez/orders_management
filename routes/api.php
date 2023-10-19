<?php

use App\Http\Controllers\ProduitsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Support\Facades\DB;

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


//CRUD utilisateur
Route::get('utilisateur',[UtilisateursController::class,'index']);
Route::get('utilisateur/details/{id}',[UtilisateursController::class, 'show']);
Route::post('utilisateur/create',[UtilisateursController::class, 'store']);
Route::put('utilisateur/edit/{id}',[UtilisateursController::class, 'update']);
Route::delete('utilisateur/delete/{id}',[UtilisateursController::class, 'destroy']);
//La liste des utlisateurs avec les produitsque chacun avait commandé
Route::get('utilisateur/commandes/produits/{id?}',[UtilisateursController::class, 'getUsersWithproducts']);
//La liste des utilisateurs avec la somme totales des commandes avec les produits inclus dans chaque commande et leurs quantité
Route::get('utilisateur/commandes/total/{id?}',[UtilisateursController::class, 'getUserWithOrderTotalPrice']);
//La liste des utilisateurs avec le nombre de commandes que chacun a effectué
Route::get('utilisateur/commandes/{id?}',[UtilisateursController::class, 'getUserWithOrder']);
//L'age moyen des utilisateur + nbr total d'utilisateur
Route::get('utilisateur/ageMoy',[UtilisateursController::class, 'getAvgAge']);



//CRUD produit
Route::get('produit',[ProduitsController::class, 'index']);
Route::post('produit/create',[ProduitsController::class, 'store']);
Route::put('produit/edit/{id}',[ProduitsController::class, 'update']);
Route::delete('produit/delete/{id}',[ProduitsController::class, 'destroy']);
Route::get('call/procedure/nbr_order/{id}', function ($id) {   
        $get_nbr_order = DB::select(       
            'CALL get_nbr_order_per_user('.$id.')'    );    
            return response()->json(['total_order'=>$get_nbr_order[0]]);    });