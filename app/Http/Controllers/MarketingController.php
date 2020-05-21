<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dash.page.marketing");
    }

   /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new Email, 'email.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new Email, $request->file('list'));
        
        return back()->with("status","liste et bien enregistrer");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $emails =  Email::all();
       foreach($emails as $email)
       {
         $email->delete();
       }
        return back();
    }

}
