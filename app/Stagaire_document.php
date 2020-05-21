<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Stagaire_document extends Model
{
    // protected $primaryKey = 'doc_id';
    protected $fillable = ['cin' , 'cv' , 'assurence' ,'lettre_recommandation'];
    //relation avec table stagaires  et stagaire_doculmments
    public function stagaire(){
        return $this->belongsTo('App\Stagaire');
    }
    public function urlcin(){
        return Storage::url($this->cin);
    }
    public function urlcv(){
        return Storage::url($this->cv);
    }
    public function urlassurance(){
        return Storage::url($this->assurence);
    }
    public function urlletrre(){
        return Storage::url($this->lettre_recommandation);
    }
}
