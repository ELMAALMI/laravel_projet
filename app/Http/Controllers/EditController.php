<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index($var , $id)
    {
        switch($var)
        {
            case "employee"   : ;
            case "stagaire"   : return view('dash.page.edit.editcolaborateur',['type'=>$var]); break;
            case "client"     : return view('dash.page.edit.editclient',['type'=>$var,"id"=>$id]);  break;
            case "fournisseur": return view('dash.page.edit.editfournisseur',['type'=>$var,"id"=>$id]); break;
            case "produit"    : return view('dash.page.edit.editproduit',["produit"=>$this->produitdata($id)]); break;
            default: return redirect("/home"); break;
        }
    }
    public function produitdata($id)
    {
        return Produit::find($id);
    }


}
