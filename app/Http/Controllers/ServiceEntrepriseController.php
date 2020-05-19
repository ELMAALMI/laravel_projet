<?php

namespace App\Http\Controllers;

use App\Job;
use App\Service_type;
use Illuminate\Http\Request;

class ServiceEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("dash.page.service",
        ['services'=>Service_type::all(),
         'jobs'=>Job::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = $_GET['type'];
        if($type == "job" or $type == "service")
        {
            return view("dash.page.add.addservice",["type"=>$type]);
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
        
        if($request->type == "tache")
        {
            $job = new Job();
            $job->job_title      = $request->titre;
            $job->max_salaire	 = $request->maxsalaire;
            $job->min_salaire	 = $request->minsalaire;
            $job->save();
            return redirect("/service")->with('status', 'La tache et bien enregistrer');
        }
        else
        {
            $service = new Service_type();
            $service->nom = $request->service;
            $service->save();
            return redirect("/service")->with('status', 'Service et bien enregistrer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $datajob = null;
        $dataservice = null;
        if($type == "job" or $type == "service")
        {
            if($type == "job")
            {
                $datajob = Job::find($id);
            }
            else
            {
                $dataservice = Service_type::find($id);
            }
            return view("dash.page.edit.editservice",
            ["type"=>$type,"datajob"=>$datajob,"dataservice"=>$dataservice,"id"=>$id]);
        }
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
        $type = $_GET['type'];
        if($type == "job")
        {
            $job = Job::find($id);
            $job->job_title      = $request->titre;
            $job->max_salaire	 = $request->maxsalaire;
            $job->min_salaire	 = $request->minsalaire;
            $job->update();
            return redirect("/service")->with('status', 'Tach et bien modifier');
        }
        elseif($type == "service")
        {
            $service = Service_type::find($id);
            $service->nom = $request->service;
            $service->update();
            return redirect("/service")->with('status', 'Service et bien modifier');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($_GET['type'] == "job")
        {
            $job = Job::find($id);
            $job->delete();
            return redirect("/service")->with('status', 'Tache et bien Supprimer');
        }
        elseif($_GET['type'] == "service")
        {
            $service = Service_type::find($id);
            $service->delete();
            return redirect("/service")->with('status', 'Service et bien Supprimer');
        }
    }
}
