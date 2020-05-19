<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagaire_document extends Model
{
    protected $primaryKey = 'doc_id';

    //relation avec table stagaires  et stagaire_doculmments
    public function directedby(){
        return $this->belongsTo('App\Stagaire');
    }

}
