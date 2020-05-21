<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Stagaire;
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
        $employees = Employee::with(['job'])->get();
        // dd($employees);
        $stagaires = Stagaire::all();
        return view('dash.page.colaborateur' , ['employees' => $employees, 'stagaires' => $stagaires ]);
    }

   
 
}
