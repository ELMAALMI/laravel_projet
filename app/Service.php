<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'service_id';

    //realtion avec table fournisseurs et servise  many to many 
    //(les donnes sont inseré sur association fournisseur_service)
    public function servere()
    {
        return $this->belongsToMany('App\Fournisseur');
    }

    //relation avec table service et factures
    public function concerne()
    {
        return $this->hasMany('App\Facture');
    }



}
