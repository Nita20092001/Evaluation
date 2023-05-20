<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProcesseurController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\DisqueDurController;
use App\Http\Controllers\EcranController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\PointDeVenteController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\Magasin_stockController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\Reception_PointVenteController;
use App\Http\Controllers\RenvoieController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\RechercheController;
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

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/index/laptop/insertion',function () {
    return view('insertionLaptop');
})->name('laptop.inserer');

Route::get('/index/laptop/liste',function () {
    return view('listeLaptop');
})->name('laptop.liste');

Route::get('/index/marque/insertion',function () {
    return view('insertionMarque');
})->name('marque.inserer');

Route::get('/index/marque/liste',[MarqueController::class,'lister'])->name('marque.liste');

Route::get('/index/processeur/insertion',function () {
    return view('insertionProcesseur');
})->name('processeur.inserer');

Route::get('/index/processeur/liste',[ProcesseurController::class,'lister'])->name('processeur.liste');

Route::get('/index/ram/insertion',function () {
    return view('insertionRam');
})->name('ram.inserer');

Route::get('/index/ram/liste',[RamController::class,'lister'])->name('ram.liste');

Route::get('/index/ecran/insertion',function () {
    return view('insertionEcran');
})->name('ecran.inserer');

Route::get('/index/ecran/liste',[EcranController::class,'lister'])->name('ecran.liste');

Route::get('/index/disqueDur/insertion',function () {
    return view('insertionDisqueDur');
})->name('disqueDur.inserer');

Route::get('/index/disqueDur/liste',[DisqueDurController::class,'lister'])->name('disqueDur.liste');

Route::get('/index/laptop/insertion',[LaptopController::class,'pageInsert'])->name('laptop.inserer');
Route::get('/index/laptop/liste',[LaptopController::class,'lister'])->name('laptop.liste');

Route::post('/index/marque/create',[MarqueController::class,'inserer'])->name('marque.create');
Route::delete('/index/marque/liste/{marque}',[MarqueController::class, 'supprimer'])->name('marque.supprimer');
Route::get('/index/marque/create/{marque}',[MarqueController::class, 'edit'])->name('marque.edit');
Route::put('/index/marque/modifier/{marque}', [MarqueController::class, 'modifier'])->name('marque.modifier');

Route::post('/index/processeur/create',[ProcesseurController::class,'inserer'])->name('processeur.create');
Route::delete('/index/processeur/liste/{processeur}',[ProcesseurController::class, 'supprimer'])->name('processeur.supprimer');
Route::get('/index/processeur/create/{processeur}',[ProcesseurController::class, 'edit'])->name('processeur.edit');
Route::put('/index/processeur/modifier/{processeur}', [ProcesseurController::class, 'modifier'])->name('processeur.modifier');

Route::post('/index/ram/create',[RamController::class,'inserer'])->name('ram.create');
Route::delete('/index/ram/liste/{ram}',[RamController::class, 'supprimer'])->name('ram.supprimer');
Route::get('/index/ram/create/{ram}',[RamController::class, 'edit'])->name('ram.edit');
Route::put('/index/ram/modifier/{ram}', [RamController::class, 'modifier'])->name('ram.modifier');

Route::post('/index/ecran/create',[EcranController::class,'inserer'])->name('ecran.create');
Route::delete('/index/ecran/liste/{ecran}',[EcranController::class, 'supprimer'])->name('ecran.supprimer');
Route::get('/index/ecran/create/{ecran}',[EcranController::class, 'edit'])->name('ecran.edit');
Route::put('/index/ecran/modifier/{ecran}', [EcranController::class, 'modifier'])->name('ecran.modifier');

Route::post('/index/disquedur/create',[DisqueDurController::class,'inserer'])->name('disquedur.create');
Route::delete('/index/disquedur/liste/{disquedur}',[DisqueDurController::class, 'supprimer'])->name('disquedur.supprimer');
Route::get('/index/disquedur/create/{disquedur}',[DisqueDurController::class, 'edit'])->name('disquedur.edit');
Route::put('/index/disquedur/modifier/{disquedur}', [DisqueDurController::class, 'modifier'])->name('disquedur.modifier');

Route::post('/index/laptop/create',[LaptopController::class,'inserer'])->name('laptop.create');
Route::delete('/index/laptop/liste/{laptop}',[LaptopController::class, 'supprimer'])->name('laptop.supprimer');
Route::get('/index/laptop/create/{laptop}',[LaptopController::class, 'edit'])->name('laptop.edit');
Route::put('/index/laptop/modifier/{laptop}', [LaptopController::class, 'modifier'])->name('laptop.modifier');

Route::get('/index/pointdevente/insertion',function () {
    return view('insertionPointDeVente');
})->name('pointdevente.inserer');
Route::get('/index/pointdevente/liste',[PointDeVenteController::class,'lister'])->name('pointdevente.liste');
Route::post('/index/pointdevente/create',[PointDeVenteController::class,'inserer'])->name('pointdevente.create');
Route::delete('/index/pointdevente/liste/{pointdevente}',[PointDeVenteController::class, 'supprimer'])->name('pointdevente.supprimer');
Route::get('/index/pointdevente/create/{pointdevente}',[PointDeVenteController::class, 'edit'])->name('pointdevente.edit');
Route::put('/index/pointdevente/modifier/{pointdevente}', [PointDeVenteController::class, 'modifier'])->name('pointdevente.modifier');

Route::get('/index/utilisateur/insertion',function () {
    return view('insertionUtilisateur');
})->name('utilisateur.inserer');
Route::get('/index/utilisateur/liste',[UtilisateurController::class,'lister'])->name('utilisateur.liste');
Route::post('/index/utilisateur/create',[UtilisateurController::class,'inserer'])->name('utilisateur.create');
Route::delete('/index/utilisateur/liste/{utilisateur}',[UtilisateurController::class, 'supprimer'])->name('utilisateur.supprimer');
Route::get('/index/utilisateur/create/{utilisateur}',[UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/index/utilisateur/modifier/{utilisateur}', [UtilisateurController::class, 'modifier'])->name('utilisateur.modifier');

Route::get('/index/affectation/insertion',[AffectationController::class,'pageAffectation'])->name('affectation.inserer');
Route::post('/index/affectation/create',[AffectationController::class,'inserer'])->name('affectation.create');
Route::post('/index/affectation/liste',[AffectationController::class,'inserer'])->name('affectation.liste');

Route::get('/index/magasin_stock/insertion',[Magasin_stockController::class,'pageStock'])->name('magasin_stock.inserer');
Route::post('/index/magasin_stock/create',[Magasin_stockController::class,'inserer'])->name('magasin_stock.create');
Route::get('/index/magasin_stock/liste',[Magasin_stockController::class,'lister'])->name('magasin_stock.liste');

Route::get('/index/transfert/insertion',[TransfertController::class,'pageTransfert'])->name('transfert.inserer');
Route::post('/index/transfert/create',[TransfertController::class,'inserer'])->name('transfert.create');
Route::get('/index/transfert/liste',[TransfertController::class,'lister'])->name('transfert.liste');

Route::get('/index/reception/insertion',[Reception_PointVenteController::class,'pageReception'])->name('reception.inserer');
Route::post('/index/reception/create',[Reception_PointVenteController::class,'inserer'])->name('reception.create');
Route::get('/index/reception/liste',[Reception_PointVenteController::class,'lister'])->name('reception.liste');

Route::get('/index/renvoie/insertion',[RenvoieController::class,'pageRenvoie'])->name('renvoie.inserer');
Route::post('/index/renvoie/create',[RenvoieController::class,'inserer'])->name('renvoie.create');

Route::get('/index/recherche/insertion',[RechercheController::class,'pageRecherche'])->name('recherche.inserer');
Route::post('/index/recherche/liste',[RechercheController::class,'recherche'])->name('recherche.liste');

Route::get('/index/vente/insertion',[VenteController::class,'pageVente'])->name('vente.inserer');
Route::post('/index/vente/create',[VenteController::class,'inserer'])->name('vente.create');
Route::get('/index/vente/liste',[VenteController::class,'lister'])->name('vente.liste');

Route::get('index/stock/liste',[StockController::class,'lister'])->name('stock.liste');