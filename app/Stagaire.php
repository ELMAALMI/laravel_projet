<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagaire extends Model
{
    protected $primaryKey = 'cne';
     //relation avec table stagaires  et employees
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
     //relation avec table stagaires  et stagaire_doculmments
    public function have(){
        return $this->hasMany('App\Stagaire_document');
    }
    //
}
