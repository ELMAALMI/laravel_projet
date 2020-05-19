<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Facture_document;
use App\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("/projet");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dash.page.add.addfacture",
        ["projet"=>Projet::findOrFail($_GET['id'])]);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facture =  $this->validation($request); 
        if($request->has("fournisseur"))
        {
            $facture['ser'];
        }
        $facture = new Facture();
        $facture->type_payment  =  $request->type_payment;
        $facture->montements    =  $request->montement;
        $facture->avance        =  $request->avance;
        $facture->reste         =  $request->montement - $request->avance;
        $facture->projet_id     =  $request->projet_id;
        $facture->save();
        
        foreach ($request->file("docs") as $doc)
        {
            $imageName = "facture".time().rand(19999,188888888888).'.'.$doc->extension();  
            $doc->storeAs("public/facture/",$imageName);
            Facture_document::create(
                [
                    "nom"=>$imageName,
                    "facture_id"=>$facture->facture_id
                ]
            );
        }
        return redirect("/projet")->with("status","Facture est bien ajouter");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect("/projet");
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("dash.page.edit.editfacture",
                     ["facture"=>Facture::findOrFail($id),
                      "docs"=>Facture_document::where("facture_id","=",$id)->get()]);
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
        $this->validation($request); 
        $facture = Facture::findOrFail($id);

        $facture->montements = $request->montement;
        $facture->avance     = $request->avance;
        $facture->reste      = $request->montement - $request->avance;
        $facture->update();

        $docs    = Facture_document::all()->where("facture_id","=",$facture->facture_id);
        
        foreach($docs as $doc)
        {
           
            if($request->hasfile($doc->document_id))
            { 
                $file = $request->file($doc->document_id);
               
                    Storage::delete("public/facture/".$doc->nom);
                    $imageName = "facture".time().rand(19999,188888888888).'.'.$file->extension();  
                    $file->storeAs("public/facture/",$imageName);
                    $doc->nom = $imageName;
                    $doc->save();
                
            }
        }
        return redirect("/projet/".$facture->projet_id)->with("status","Facture et bien modifier");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facdocs = Facture_document::where("facture_id","=",$facture->facture_id)->get();
        foreach($facdocs as $doc)
        {
                    Storage::delete("public/facture/".$doc->nom);
        }
        $facture->delete();
        return back()->with("status","Facture et bien supprimer");
    }


    /**
     * validation data facture 
     */
    public function validation(Request $request)
    {
    return  Validator::make($request->all(),
        [
            "type_payment"  => "required" ,
            "montement"     => 'required|numeric|gte:avance',
            "avance"        => "required" ,
            "reste"         => "required"
        ])->validate();
    }


}
