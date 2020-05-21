<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Fournisseur;
use App\Fourniture;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montementstotal      = Facture::where("fourniture_id","!=","null")->sum("montements");
        return view('dash.page.fournisseur',
                    ["fournisseurs"=>Fournisseur::all(),
                     "services"=>Service::all(),
                     "montement"=>$montementstotal,
                     "totalfournisseur"=>Fournisseur::count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("dash.page.add.addfournisseur",["services"=>Service::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fournisseur = $this->validation($request);
        $imageName = "facture".time().rand(19999,188888888888).'.'.$request->file("logo")->extension();  
        $request->file("logo")->storeAs("public/logofounisseur/",$imageName);
        $fournisseur['logo'] = $imageName;
        $fournisseur = Fournisseur::create($fournisseur);
        Fourniture::create(
            ["fournisseur_id"=>$fournisseur->fournisseur_id,
            "service_id"=>$request->service_id]);
        (new FactureController())->store($request);
        return redirect("/fournisseur")->with("status","Fournissuer et bien enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facture = [];
        $fournisseur = Fournisseur::findOrFail($id);
        $fourniteur  = Fourniture::where("fournisseur_id","=",$fournisseur->fournisseur_id)->get();
        if(count($fourniteur)>0)
        {
            $facture     = Facture::where("fourniture_id","=",$fourniteur[0]->id)->get();

        }
        return view("dash.page.profile.fournisseurprofile",
        ["fournisseur"=>$fournisseur,"factures"=>$facture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("dash.page.edit.editfournisseur",["fournisseur"=>Fournisseur::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fournisseur = Fournisseur::findOrFail($id);

        $fournisseur->nom     = $request->nom;
        $fournisseur->tele    = $request->tele;
        $fournisseur->email   = $request->email;
        $fournisseur->adresse = $request->adresse;
        if($request->hasFile("logo"))
        {
            
            $file = $request->file("logo");
            Storage::delete("public/logofounisseur/".$fournisseur->logo);
            $imageName = "facture".time().rand(19999,188888888888).'.'.$file->extension();  
            $file->storeAs("public/logofounisseur/",$imageName);
           
            $fournisseur->logo    = $imageName;
            
        }
      $fournisseur->update();
        return redirect("/fournisseur")->with("status","fournissaur est bien modifier");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseur::findOrFail($id)->destroy();
        return back()->with("status","fournisseur et supprimer");
    }



    /**
     * 
     * data validation
     */
    public function validation(Request $request)
    {
    return  Validator::make($request->all(),
        [
            "nom"         => 'unique:fournisseurs',
            "tele"        => 'unique:fournisseurs',
            "email"       => 'unique:fournisseurs',
            "adresse"     => 'required',
        ],
        [
            "nom.unique"  =>"nom déja exite",
            "tele.unique" =>"tele déja exite",
            "email.unique"=>"email déja exite",
        ]
        )->validate();
    }
}
