<?php

use App\Role;
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
   
            Route::resource('/clients','ClientController');
            Route::resource('/fournisseur','FournisseurController');
            Route::resource('/produit','ProduitController');
            Route::resource('/marketing','MarketingController');    
            Route::resource('/bilan','BilanController');    
            Route::resource('/service','ServiceController');    
            Route::resource('/projet','ProjetController');    
	
	
    Route::resource('/home', 'HomeController');
    Route::resource('/colaborateur', 'ColaborateurController')->only(['index']);
	Route::resource('/stagaire','StagaireController');  
    Route::resource('/employee','EmployeeController'); 
    Route::resource('/clients','ClientController');
    Route::resource('/fournisseur','FournisseurController');
    Route::resource('/produit','ProduitController');
    Route::resource('/marketing','MarketingController')->only("index","destroy");    
    Route::resource('/service','ServiceEntrepriseController'); 
    Route::resource('/fournisseurservice','ServiceFournisseurController'); 
    Route::resource('/factures','FactureController');       
    Route::resource('/projet','ProjetController'); 
	            Route::resource('/rapport','RapportController'); 

    /* import and export data from email table */
    Route::post('import', 'MarketingController@import');
    Route::get('export', 'MarketingController@export');
    /** get data for chart with ajax route */
    Route::get("/getdataproduit","AjaxController@projetorder");
    Route::get("/getdatachiffre","AjaxController@datachiffre");
    Route::get("/getdatarevenu","AjaxController@datarevenu");
    Route::get("/getdatservice","AjaxController@dataservice");
});



