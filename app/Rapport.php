<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $primaryKey = "rapport_id";

    //relation avec table rapports et employees
    public function creerpar(){
        return $this->belongsTo('App\Employee');
    }
}
