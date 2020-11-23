<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreurController;


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
    Route::get('livreur/create', [LivreurController::class, 'store_livreur']);

    Route::get('livreur/Nom', [LivreurController::class, 'show_livreur']);
    Route::get('livreur/prenom', [LivreurController::class, 'show_livreur']);
    Route::get('livreur/mail', [LivreurController::class, 'show_livreur']);
    Route::get('livreur/numero', [LivreurController::class, 'show_livreur']);
    Route::get('livreur/zone', [LivreurController::class, 'show_livreur']);

    Route::get('livreur/Nom/{nom}', [LivreurController::class, 'show_livreur_nom_choisi'])->name('afficher.livreur.chercherNom');
    Route::get('livreur/prenom/{prenom}', [LivreurController::class, 'show_livreur_prenom_choisi'])->name('afficher.livreur.chercherPrenom');
    Route::get('livreur/mail/{mail}', [LivreurController::class, 'show_livreur_email_choisi'])->name('afficher.livreur.chercherEmail');
    Route::get('livreur/numero/{numero}', [LivreurController::class, 'show_livreur_numero_choisi'])->name('afficher.livreur.chercherNum');
    Route::get('livreur/zone/{id_zone}', [LivreurController::class, 'show_livreur_zone_choisi'])->name('afficher.livreur.chercherZone');

    Route::get('livreur/supprimer/{id}', [LivreurController::class, 'destroy_livreur'])->name('supprimer.livreur');
    Route::get('livreur/edit/{id}', [LivreurController::class, 'edit_livreur'])->name('edit.livreur');
    Route::post('livreur/update', [LivreurController::class, 'update_livreur'])->name('update.livreur');
});



