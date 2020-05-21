<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreRapport;
use App\Rapport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dash.page.add.addrapport');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRapport $request)
    {
        $validatedata = $request->validated();
        // dd($validatedata);
        $employee = Employee::findOrFail($request->user()->employee_id);
    //    dd($request);
        if($request->hasFile('rapport')){
            $path = $request->file('rapport')->store('rapports');
        }

         $employee->rapports()->create([
            'title' => $validatedata['title'],
            'path' => $path
            ]);
        
        $request->session()->flash('statut', 'Rapport  was created!');
        return redirect()->route('employee.show', ['employee' => $employee->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rapport = Rapport::findOrfail($id);
        return view('dash.page.edit.editrapport' , ['rapport' => $rapport]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRapport $request, $id)
    {
        //
        $rapport = Rapport::findOrFail($id);

        $validatedData = $request->validated();
        // dd($validatedData);
        $rapport->title = $validatedData['title'];

        // if($request->hasFile('rapport')){

        //     $path = $request->file('picture')->store('posts');

        //     if($rapport->path){

        //         Storage::delete($rapport->path);

        //         $rapport->path = $path;

        //         $rapport->save();
        //     }
        //     else{
        //         $post->image->save(Im::make(['path' => $path]));
        //     }
        //     $image = new Image(['path' =>$path]);
        //     $post->image()->save($image);
        // }

        $rapport->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        //
        $rapport = Rapport::findOrFail($id);
           
        $rapport->delete();
        
        $request->session()->flash('statut', 'rapport was deleted!');

     
        return redirect()->back();
    }
}
