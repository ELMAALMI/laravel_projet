<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
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
        return view('dash.page.fournisseur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("dash.page.add.addfournisseur");
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
        $request['fournisseur'] = $fournisseur->fournisseur_id;
        (new ServiceFournisseurController())->store($request);
        return redirect()->with("status","Fournissuer et bien enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = null ;
        return view("dash.page.profile.fournisseurprofile");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("dash.page.edit.editfournisseur");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
