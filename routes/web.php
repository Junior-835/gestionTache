<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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

Route::get("/liste", [EtudiantController::class, "liste_tache"]);
Route::get("/ajouter", [EtudiantController::class, "ajouter_tache"]);
Route::post("/ajouter/traitement", [EtudiantController::class, "ajouter_tache_traitement"]);
Route::get("/delete_tache/{id}", [EtudiantController::class, "delete_tache"]);
Route::get("/update_tache/{id}", [EtudiantController::class, "update_tache"]);
Route::post("/update/traitement", [EtudiantController::class, "update_tache_traitement"]);