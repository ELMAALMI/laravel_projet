<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture_document extends Model
{
    protected $primaryKey = 'document_id';
    protected $fillable = ["nom","facture_id"];

    //
//relation avec table facture_documments et factures
    public function appartient(){
        return $this->belongsTo('App\Facture');
    }

}
