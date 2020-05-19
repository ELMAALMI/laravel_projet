<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('dash.home');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = "fac".time().'.'.$request->image->extension();  
   
        $request->image->move('doc/', $imageName);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
        
    }
}
