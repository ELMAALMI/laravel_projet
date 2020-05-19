<?php

namespace App\Http\Controllers;

use App\Client;
use App\Facture;
use App\Facture_document;
use App\Projet;
use App\Service_type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    public function index()
    {
        
        return view("dash.page.projet",
        ["projets"=>Projet::all(),
        "totalprojet"=>Projet::count(),
        "totalrevenu"=>Facture::where("projet_id","!=","null")->sum("montements")]);
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // validation data
        $this->validation($request);
       
        $projet = new Projet();      
        $projet->nom_projet      =  $request->nom_projet;
        $projet->date_demande    =  date('Y-m-d', strtotime($request->date_demande));
        $projet->date_livraison  =  date('Y-m-d', strtotime($request->date_livraison));
        $projet->etat            =  $request->etat;
        $projet->description     =  htmlentities($request->description);
       
        $projet->client_id       = $request->client_id; 
       
        $projet->service_id      =  $request->service;
        
        $projet->save();
        (new FactureController())->store($request);
            return redirect("/clients")->with('status',"Projet et bien enregestrie");
    }
    /**
     * get docs of fature
     */

    public static function  getdocs($id)
    {
        return Facture_document::where("facture_id","=",$id)->get();
    }

  /**
     * validation data from request
     */
    public function validation($request)
    {
        Validator::make($request->all(),
        [
            "nom_projet"     => 'unique:projets',
            "client_id"      => 'required|int',
            "date_demande"   => 'date|before:date_livraison',
            "date_livraison" => 'date|after:date_demande'
        ])->validate();
    }



    public function create()
    {
        $services = Service_type::all();
        $client = Client::findOrFail($_GET['id']);
        return view('dash.page.add.addprojet',
                    ["services"=>$services,
                    "client"=>$client
                    ]);
    }
    public function show($id)
    {
        return view("dash.page.profile.projetprofile",
        ["factures"=>Facture::where("projet_id","=",$id)->get(),
        "projet"=>Projet::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("dash.page.edit.editprojet",
                    ["projet"=>Projet::findOrFail($id),
                    "services"=>Service_type::all()]);
    }

    public function update(Request $request,$id)
    {
            $projet = Projet::findOrFail($id);
            $projet->nom_projet      =  $request->nom_projet;
            $projet->date_demande    =  date('Y-m-d', strtotime($request->date_demande));
            $projet->date_livraison  =  date('Y-m-d', strtotime($request->date_livraison));
            $projet->etat            =  $request->etat;
            $projet->description     =  htmlentities($request->description);
            $projet->update();

            return redirect("projet/".$id)->with("status","projet bien modifier"); 
   }

    public function clientdelet($id)
    {
        $projets = Projet::select("projet_id")->where("client_id","=",$id)->get();
        foreach ($projets as $projet)
        {
            $factures = Facture::select("facture_id")
                                ->where("projet_id","=",$projet->projet_id)
                                ->get();
            foreach($factures as $facture)
            {
                (new FactureController())->destroy($facture->facture_id);
            }
            $projet->delete();
        } 
    }

    public function destroy($id)
    {
      
        $projet   = Projet::findOrFail($id);
        $factures = Facture::select("facture_id")
                            ->where("projet_id","=",$projet->projet_id)
                            ->get();
        foreach($factures as $facture)
        {
            (new FactureController())->destroy($facture->facture_id);
        }
        $projet->delete();
        return back()->with('status',"Le projet et bien supprimer");
    }

}
