<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/failed', function () {
    return view('failed');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/agents', [App\Http\Controllers\AdminController::class, 'index'])->name('agents');
Route::get('/delete_agent', [App\Http\Controllers\AdminController::class, 'destroy'])->name('delete_agent');
Route::get('/update_agent', [App\Http\Controllers\AdminController::class, 'get_agent'])->name('update_agent');
Route::get('/mod_agent', [App\Http\Controllers\AdminController::class, 'update'])->name('mod_agent');
Route::get('/creer_agent', [App\Http\Controllers\AdminController::class, 'creer_agent'])->name('creer_agent');
Route::get('/statistiques_admin',[App\Http\Controllers\AdminController::class, 'statistiques_admin'])->name('statistiques_admin');


Route::get('/prendre_rendez_vous',[App\Http\Controllers\CitoyenController::class, 'prendre_rendez_vous'])->name('prendre_rendez_vous');
Route::get('/save_rendez_vous',[App\Http\Controllers\CitoyenController::class, 'save_rendez_vous'])->name('save_rendez_vous');
Route::get('/dossiers',[App\Http\Controllers\CitoyenController::class, 'dossiers'])->name('dossiers');
Route::get('/save_dossiers',[App\Http\Controllers\CitoyenController::class, 'save_dossiers'])->name('save_dossiers');
Route::get('/acte_naissance',[App\Http\Controllers\CitoyenController::class, 'acte_naissance'])->name('acte_naissance');
Route::get('/acte_mariage',[App\Http\Controllers\CitoyenController::class, 'acte_mariage'])->name('acte_mariage');
Route::get('/acte_divorce',[App\Http\Controllers\CitoyenController::class, 'acte_divorce'])->name('acte_divorce');
Route::post('/loginn',[App\Http\Controllers\CitoyenController::class, 'authenticate'])->name('authenticate');
Route::post('/logoutt',[App\Http\Controllers\CitoyenController::class, 'logoutt'])->name('logoutt');

Route::get('/modifier_rendez_vous/{id}',[App\Http\Controllers\AgentController::class, 'modifier_rendez_vous'])->name('modifier_rendez_vous');
Route::get('/modifier_dossier',[App\Http\Controllers\AgentController::class, 'modifier_dossier'])->name('modifier_dossier');
Route::get('/gestion_rdvs',[App\Http\Controllers\AgentController::class, 'gestion_rdvs'])->name('gestion_rdvs');
Route::get('/gestion_dossiers',[App\Http\Controllers\AgentController::class, 'gestion_dossiers'])->name('gestion_dossiers');
Route::get('/stat_dossiers',[App\Http\Controllers\AdminController::class, 'stat_dossiers'])->name('stat_dossiers');

Route::get('/find',[App\Http\Controllers\agentController::class, 'find'])->name('web.find');

Route::get('/stat_dossiers',[App\Http\Controllers\AdminController::class, 'stat_dossiers'])->name('stat_dossiers');
Route::get('/dossiers_agence_find',[App\Http\Controllers\AdminController::class, 'dossiers_agence_find'])->name('dossiers_agence_find');


Route::get('/delete_dossier',[App\Http\Controllers\AgentController::class, 'delete_dossier'])->name('delete_dossier');
Route::get('/gestion_actes',[App\Http\Controllers\AgentController::class, 'gestion_actes'])->name('gestion_actes');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/creer_mariage',[App\Http\Controllers\AgentController::class, 'creer_mariage'])->name('creer_mariage');
Route::post('/creer_divorce',[App\Http\Controllers\AgentController::class, 'creer_divorce'])->name('creer_divorce');

Route::post('/creer_naissance',[App\Http\Controllers\AgentController::class, 'creer_naissance'])->name('creer_naissance');

Route::get('/gestion_registes',[App\Http\Controllers\AgentController::class, 'gestion_registes'])->name('gestion_registes');
Route::get('/update_citoyen', [App\Http\Controllers\AgentController::class, 'get_citoyen'])->name('update_citoyen');
Route::get('/mod_citoyen', [App\Http\Controllers\AgentController::class, 'update_citoyen'])->name('mod_citoyen');

Route::get('/find_citoyen',[App\Http\Controllers\agentController::class, 'find_citoyen'])->name('web.find_citoyen');

Route::get('/creer_citoyen',[App\Http\Controllers\AgentController::class, 'creer_citoyen'])->name('creer_citoyen');
Route::get('/statistiques',[App\Http\Controllers\AgentController::class, 'statistiques'])->name('statistiques');
Route::get('/save_rendez_vous_agent',[App\Http\Controllers\AgentController::class, 'save_rendez_vous_agent'])->name('save_rendez_vous_agent');

Route::get('/modifier_rendez_vous_ins/{id}',[App\Http\Controllers\AgentController::class, 'modifier_rendez_vous_ins'])->name('modifier_rendez_vous_ins');
Route::get('/gestion_rdvs_ins',[App\Http\Controllers\AgentController::class, 'gestion_rdvs_ins'])->name('gestion_rdvs_ins');
Route::get('/save_rendez_vous_agent_ins',[App\Http\Controllers\AgentController::class, 'save_rendez_vous_agent_ins'])->name('save_rendez_vous_agent_ins');

Route::get('files/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/public'.'/uploads/'.$file_name;
    //return $path;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('download');

