<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $primaryKey = 'fournisseur_id';
    protected $fillable   = ["nom","tele","email","adresse","logo"];

    //realtion avec table fournisseurs et servise  many to many 
    //(les donnes sont inseré sur association fournisseur_service)
    public function servire()
    {
        return $this->belongsToMany('App\Service');
    }

    //
}
