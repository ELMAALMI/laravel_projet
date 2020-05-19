<?php


use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get("/",function()
{     if(Auth::check())
     {
        return redirect("/home");
     }
     else
     {
        return view('auth.login');
     }
});

Route::group(['middleware'=>'auth'],function()
{
    Route::resource('/home', 'HomeController');
    Route::resource('/colaborateur', 'ColaborateurController');
    Route::resource('/clients','ClientController');
    Route::resource('/fournisseur','FournisseurController');
    Route::resource('/produit','ProduitController');
    Route::resource('/marketing','MarketingController');    
    Route::resource('/bilan','BilanController');    
    Route::resource('/service','ServiceEntrepriseController'); 
    Route::resource('/factures','FactureController');       
    Route::resource('/projet','ProjetController');    
});



