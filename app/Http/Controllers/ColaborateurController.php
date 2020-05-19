<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaborateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.page.colaborateur');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $_GET['type'];
        if($type == "employee" or $type == "stagaire")
        {
            return view("dash.page.add.addcolaborateur",['type'=>$type]);
        }
        else
        {
            return redirect("/home");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
          
        return response()->json([
            'success'=>'get your data hello'
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id , $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = $_GET['type'];
      
        if($type == "employee" or $type == "stagaire")
        {
            $data = null;

            return view("dash.page.profile.colaborateurprofile",["type"=>$type]);        }
        else
        {
            return redirect("/home");
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $_GET['type'];
      
        if($type == "employee" or $type == "stagaire")
        {
            $data = null;
            return view("dash.page.edit.editcolaborateur",["type"=>$type]);        }
        else
        {
            return redirect("/home");
        }
        
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
}
