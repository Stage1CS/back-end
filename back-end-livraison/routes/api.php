<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\magasinController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){

///////////////// LIVREUR //////////////////////////////////////////////////////////////////////////////

    Route::get('livreur', [LivreurController::class, 'index_livreur']);
    Route::post('livreur', [LivreurController::class, 'store_livreur']);

    Route::get('livreur/{livreur}', [LivreurController::class, 'show_livreur']);

    Route::get('livreur', [LivreurController::class, 'show_livreur_nom']);
    Route::get('livreur', [LivreurController::class, 'show_livreur_prenom']);
    Route::get('livreur', [LivreurController::class, 'show_livreur_email']);
    Route::get('livreur', [LivreurController::class, 'show_livreur_numero']);
    //Route::get('livreur/zone/{id_zone}', [LivreurController::class, 'show_livreur_zone_choisi']);
    
    Route::delete('livreur/{livreur}', [LivreurController::class, 'destroy_livreur']);
    Route::put('livreur/{livreur}', [LivreurController::class, 'update_livreur']);

///////////////// MAGASIN //////////////////////////////////////////////////////////////////////////////

    Route::get('magasin', [magasinController::class, 'index_magasin']);
    Route::post('magasin', [magasinController::class, 'store_magasin']);

    Route::get('magasin/{magasin}', [magasinController::class, 'show_magasin']);

    Route::delete('magasin/{magasin}', [magasinController::class, 'destroy_magasin']);
    Route::put('magasin/{magasin}', [LivreurController::class, 'update_magasin']);
});



