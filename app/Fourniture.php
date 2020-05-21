<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fourniture extends Model
{

    protected $fillable   = ["fournisseur_id","service_id"];
    public function concerne()
    {
        return $this->hasMany('App\Facture');
    }

    //
}