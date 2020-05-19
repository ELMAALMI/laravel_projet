<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $primaryKey = "projet_id";


    

    //
    //realtion avec table projets et factures  one to many 
     
    public function avoir()
    {
        return $this->hasMany('App\Facture');
    }

       //realtion avec table service_types et projets  many to many 
     //(les donnes sont inseré sur association service_type_projet)
    public function created_from()
    {
        return $this->hasMany('App\Service_type');
    }

    //realtion avec table clients et projets  many to many 
     //(les donnes sont inseré sur association client_projet)
    public function demmande_par()
    {
        return $this->hasOne('App\Client');
    }





}
