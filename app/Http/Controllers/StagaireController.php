<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreStagaire;
use App\Http\Requests\UpdateStagaire;
use App\Job;
use App\Stagaire;
use App\Stagaire_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StagaireController extends Controller
{
    public function edit($id)
    {
        //
            $stagaire = Stagaire::findOrFail($id);
            
            return view('dash.page.profile.stagaireprofile', ['stagaire' => $stagaire]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobs = Job::all();
        $employees = Employee::all();
        return view('dash.page.add.addstagaire' , ['jobs' =>$jobs , 'employees' => $employees ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStagaire $request)
    {
        // dd($request);
        $validatedData = $request->validated();

        $validatedData['employee_id'] = $request->employee_id;

        $employee = Employee::findOrFail($validatedData['employee_id']);
        
        $validatedData['job_id'] = $employee->job->id;

        $validatedData['nom_ecole'] = $request->nom_ecole;

        $validatedData['nom_projet'] = $request->nom_projet;

        $stagaire =  Stagaire::create($validatedData);

        // dd($request);
        if($request->hasFile('cindoc') && $request->hasFile('cvdoc') && $request->hasFile('assurancedoc') && $request->hasFile('lettredoc')){
            
            $cin = $request->file('cindoc')->store('stagairedocs');

            $cv = $request->file('cvdoc')->store('stagairedocs');

            $assurence = $request->file('assurancedoc')->store('stagairedocs');

            $lettre_recommandation = $request->file('lettredoc')->store('stagairedocs');

            $stagaireedoc = new Stagaire_document(['cin' =>$cin , 'cv' => $cv ,'assurence' => $assurence , 'lettre_recommandation' => $lettre_recommandation  ]);

            $var = $stagaire->stagairedoc()->save($stagaireedoc);

           

        }
        $request->session()->flash('statut', 'Employee was created!');

        return redirect()->route('stagaire.show' , ['stagaire' => $stagaire]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::all();
        $jobs = Job::all();
        $stagaire = Stagaire::with(['employee' , 'job'])->findOrFail($id);
        return view('dash.page.profile.stagaireprofile' , ['stagaire' => $stagaire , 'jobs' => $jobs , 'employees' => $employees]);

    }

   
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStagaire $request, $id)
    {
        // dump($request);
        $stagaire = Stagaire::findOrFail($id);

        if($request->hasFile('cindoc')){

            $cin = $request->file('cindoc')->store('stagairedocs');

            if($stagaire->stagairedoc){

                Storage::delete($stagaire->stagairedoc->cin);

                $stagaire->stagairedoc->cin = $cin;

                $stagaire->stagairedoc->save();
            }
            else{
                $stagaire->stagairedoc->save(Stagaire_document::make(['cin' => $cin]));
            }
            $stagairedoc = new Stagaire_document(['cin' =>$cin]);

            $stagaire->stagairedoc()->save($stagairedoc);
        }
       
        if($request->hasFile('cvdoc')){

            $cv = $request->file('cvdoc')->store('stagairedocs');

            if($stagaire->stagairedoc){

                Storage::delete($stagaire->stagairedoc->cv);

                $stagaire->stagairedoc->cv = $cv;

                $stagaire->stagairedoc->save();
            }
            else{
                $stagaire->stagairedoc->save(Stagaire_document::make(['cv' => $cv]));
            }
            $stagairedoc = new Stagaire_document(['cv' =>$cv]);

            $stagaire->stagairedoc()->save($stagairedoc);
        }

        if($request->hasFile('assurancedoc')){

            $assurence = $request->file('assurancedoc')->store('stagairedocs');

            if($stagaire->stagairedoc){

                Storage::delete($stagaire->stagairedoc->assurence);

                $stagaire->stagairedoc->assurence = $assurence;

                $stagaire->stagairedoc->save();
            }
            else{
                $stagaire->stagairedoc->save(Stagaire_document::make(['assurence' => $assurence]));
            }
            $stagairedoc = new Stagaire_document(['assurence' =>$assurence]);

            $stagaire->stagairedoc()->save($stagairedoc);
        }

        if($request->hasFile('lettredoc')){

            $lettredoc = $request->file('lettredoc')->store('stagairedocs');

            if($stagaire->stagairedoc){

                Storage::delete($stagaire->stagairedoc->lettre_recommandation);

                $stagaire->stagairedoc->lettre_recommandation = $lettredoc;

                $stagaire->stagairedoc->save();
            }
            else{
                $stagaire->stagairedoc->save(Stagaire_document::make(['lettre_recommandation' => $lettredoc]));
            }
            $stagairedoc = new Stagaire_document(['lettre_recommandation' =>$lettredoc]);

            $stagaire->stagairedoc()->save($stagairedoc);
        }

        $validatedData = $request->validated();
        
        $stagaire->fill($validatedData);
        
        $stagaire->save();

        $request->session()->flash('statut', 'Stagaire was updated!');
        
        return redirect()->route('stagaire.show', ['stagaire' => $stagaire->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        //
        public function destroy(Request $request , $id)
        {
            //
            $stagaire = Stagaire::findOrFail($id);
           
            $stagaire->delete();
            
            $request->session()->flash('statut', 'stagaire was deleted!');
    
         
            return redirect()->route('colaborateur.index');
        
        }
        
}
