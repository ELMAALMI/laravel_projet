<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Produit;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('dash.home',
        ["montement" =>Facture::where("projet_id","!=","null")->sum("montements"),
         "users" =>User::count(),
         "produit" =>Produit::count()]);
    }
}
