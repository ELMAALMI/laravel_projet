<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagaire extends Model
{
    
    protected $fillable = ['cne' , 'nom' , 'prenom' , 'email' , 'sexe' ,'adresse' , 'date_naissance' , 'date_debut' ,'date_fin' , 'nom_ecole' , 'nom_projet' , 'employee_id' , 'job_id' , 'tele' ];
     //relation avec table stagaires  et employees

    public function employee(){
        return $this->belongsTo('App\Employee');
    }

    public function job(){
        return $this->belongsTo('App\Job');
    }
     //relation avec table stagaires  et stagaire_doculmments
    public function stagairedoc(){
        return $this->hasOne('App\Stagaire_document');
    }

    public function rapports(){
        return $this->morphMany('App\Rapport' , 'rapportable');
    }
    //
}
