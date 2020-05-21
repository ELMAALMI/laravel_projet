<?php

namespace App\Http\Controllers;

use App\Client;
use App\Facture;
use App\Http\Requests\ClientStore;
use App\Projet;
use App\Service_type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get all clients
        $dataclient           = Client::all();
        // get montementstotal
        $montementstotal      = Facture::where("projet_id","!=","null")->sum("montements");
        // get top client 
        $topclientid          = Projet::
                                select(DB::raw("client_id,count(*) as nb"))
                                ->groupBy("client_id")->orderByRaw("nb desc")->limit(1)->get();
        // get top projet
        
        $projetid             = DB::table("factures")
                                ->select(DB::raw("projet_id,sum(montements) as total"))
                                ->groupBy("projet_id")
                                ->orderByRaw("total desc")
                                ->having("projet_id","!=","null")
                                ->limit(1)
                                ->get();
        //get data of top projet
        if(count($projetid) == 1 and count($topclientid) == 1)
        {
            
            $tpoprojet            = Projet::where("projet_id","=",$projetid[0]->projet_id)->get()[0];
            $topclient            = Client::where("client_id","=",$topclientid[0]->client_id)->get()[0];
    
            return view('dash.page.clients',
            ["clients"=>$dataclient,"totalclient"=>Client::count(),
            "totalrevenu"=>$montementstotal,
            "topclient"=>["client"=>$topclient,"nbprojet"=>$topclientid[0]->nb],
            "topprojet"=>["projet"=>$tpoprojet,"montements"=>$projetid[0]->total]
            ]);
        }
        else
        {
            
            return view("dash.page.clients",
            ["clients"=>$dataclient,
            "totalclient"=>Client::count(),
            "totalrevenu"=>$montementstotal]);
        }
    }

    public static function nbofprojet($clientid)
    {
        $nb = Projet::select(DB::raw("count(*) as nb"))
              ->groupBy("client_id")
              ->having("client_id","=",$clientid)
              ->get();
        return $nb[0];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service_type::all();
        return view('dash.page.add.addclient',
        ["services"=>$services]);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStore $request)
    {
            
            try
            {              
                    $client = new Client();
                    $client->cin             =  $request->cin;
                    $client->nom             =  $request->nom;
                    $client->prenom          =  $request->prenom;
                    $client->date_naissance  =  date('Y-m-d', strtotime($request->date_naissance));
                    $client->sexe            =  $request->sexe;
                    $client->tele            =  $request->tele;
                    $client->email           =  $request->email;
                    $client->adresse         =  $request->adresse;
                    $client->save();
                    $request['client_id'] = $client->client_id;
                    (new ProjetController())->store($request);
                    return redirect("/clients")->with('status',"Client et bien enregestrie");
        
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id,type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      
        $data = Client::findOrFail($id);
        $projets = $data->demmande;
        return view("dash.page.profile.clientprofile",['client'=> $data,"projets"=>$projets]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("dash.page.edit.editclient",["client"=>Client::findOrFail($id)]);
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
        $client = Client::findOrfail($id);
                    $client->cin             =  $request->cin;
                    $client->nom             =  $request->nom;
                    $client->prenom          =  $request->prenom;
                    $client->date_naissance  =  date('Y-m-d', strtotime($request->date_naissance));
                    $client->sexe            =  $request->sexe;
                    $client->tele            =  $request->tele;
                    $client->email           =  $request->email;
                    $client->adresse         =  $request->adresse;
        $client->update();
        return redirect("/clients")->with('status','client et bien modifier');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            
            $client = Client::findOrFail($id);
            (new ProjetController())->clientdelet($client->client_id);
            $client->delete();
            return redirect("/clients")->with('status',"votre suppression et bien fait");
        }
        catch(Exception $e)
        {
            return redirect("/clients")->with('status',"Nous avons racontter des problems");
        }
    }




}
