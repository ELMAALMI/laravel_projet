<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EmployeeDocs extends Model
{
    //

    protected $fillable = ['cin' , 'contrat' ,'diplome'];

    public function employeedocs(){

        return $this->belongsTo('App\Employee');
    }

    public function urlcin(){
        return Storage::url($this->cin);
    }
    public function urldiplome(){
        return Storage::url($this->diplome);
    }
    public function urlcontrat(){
        return Storage::url($this->contrat);
    }
}
