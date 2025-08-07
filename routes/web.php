<?php

use App\Http\Controllers\KimController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//Route pour recette

Route::view('/Partage+des+recettes', 'user/partage_recette')
    ->middleware(['auth'])
    ->name('p.recette');

Route::view('mes+recettes','user.mes_recette')
    ->middleware(['auth'])
    ->name('m.recette');

Route::get('supprimer+recette={id}',[KimController::class , 'delete_recette'])
    ->middleware(['auth'])
    ->name('delete.product');

Route::view('Recettes', 'user.recette')
    ->middleware(['auth'])
    ->name('recette');

Route::get('/J\'aime+la+recette+q={id?}',[KimController::class , 'jaime'])
    ->middleware(['auth'])
    ->name('recette.jaime');
    
Route::get('J\'aime+la+recette+q=/{id?}/',[KimController::class , 'jaimes'])
    ->middleware(['guest'])
    ->name('recettes.jaime');
// sendComs
Route::put('/Commentaire+sur+la+recette+q={id?}',[KimController::class , 'sendComs'])
    ->middleware(['auth'])
    ->name('send.coms');

Route::put('/Commentaire+sur+la+recette+q=/{id?}/',[KimController::class , 'sendCom'])
    ->middleware(['guest'])
    ->name('sends.coms');
// recherche
Route::get('recherche',[KimController::class , 'recherche'])
    ->middleware(['guest'])
    ->name('query');

Route::view('/Recettes/All','guest.recette')
    ->middleware(['guest'])
    ->name('recette.guest');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('utilisateurs','admin.user')
    ->middleware(['auth'])
    ->name('admin.user');

require __DIR__.'/auth.php';
