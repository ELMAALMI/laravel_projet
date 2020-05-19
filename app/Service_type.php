<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_type extends Model
{
    //
    protected $primaryKey = 'service_id';

    
       //realtion avec table service_types et projets  many to many 
     //(les donnes sont inseré sur association service_type_projet)
    public function make_projet()
    {
        return $this->belongsToMany('App\Projet');
    }
    
        
    
}
