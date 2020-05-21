<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeDocs;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    
    public function edit($id)
    {
        //
            $employee = Employee::with('employeedoc')->findOrFail($id);
            $jobs = Job::all();
            return view('dash.page.profile.employeeprofile', ['employee' => $employee , 'jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $jobs = Job::all();
        return view('dash.page.add.addemployee' , ['jobs' => $jobs]);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {   
        // dd($request);
        $validatedData = $request->validated();

        $validatedData['sexe'] = $request->sexe;

        $validatedData['job_id'] = $request->job_id;

        $employee =  Employee::create($validatedData);


        if($request->hasFile('cindoc') && $request->hasFile('diplomedoc') && $request->hasFile('contratdoc') ){
            
            $cin = $request->file('cindoc')->store('employeedocs');

            $diplome = $request->file('diplomedoc')->store('employeedocs');

            $contrat = $request->file('contratdoc')->store('employeedocs');

            $employeedoc = new EmployeeDocs(['cin' =>$cin , 'diplome' => $diplome , 'contrat' => $contrat]);

            $employee->employeedoc()->save($employeedoc);


        }

        if($request->has('compte')){


                $user = new User();
                $user->name = $request->nom;
                $user->email = $request->email;
                $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; 
                $employee->user()->save($user);
                // auth()->login($user);
        }

        $request->session()->flash('statut', 'Employee was created!');

        return redirect()->route('employee.show' , ['employee' => $employee]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $jobs = Job::all();
        $employee = Employee::with(['employeedoc' , 'rapports'])->findOrFail($id);
        return view('dash.page.profile.employeeprofile' , ['employee' => $employee , 'jobs' => $jobs]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request,$id)
    {
       
        $validatedData = $request->validated();

        $employee = Employee::findOrFail($id);
        
        $employee->fill($validatedData);

        $employee->job_id = $request->job_id;

        $employee->save();
        
        $request->session()->flash('statut', 'Employee was updated!');
        
        return redirect()->route('employee.show', ['employee' => $employee->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        //
        $employee = Employee::findOrFail($id);
       
        $employee->delete();

        $request->session()->flash('statut', 'Employee was deleted!');

     
        return redirect()->route('colaborateur.index');
    }
}
