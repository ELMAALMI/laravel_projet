<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $primaryKey = 'facture_id';
    protected $fillable   = ["type_payment",
                             "montements",
                             "avance",
                             "reste",
                             "service_id",
                             "projet_id"];

    //relation avec table service et factures

    public function appartient()
    {    
        return $this->belongsTo('App\Service');
    }


    //relation avec table facture_documments et factures

    public function avoir()
    {
        return $this->HasMany('App\Facture_doucument');
    }

    //relation avec table projets et factures
    
    public function appartenir()
    {
        return $this->hasOne('App\Projet');
    }

}
