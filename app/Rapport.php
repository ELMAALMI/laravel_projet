<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Rapport extends Model
{
    // protected $primaryKey = "rapport_id";

    //relation avec table rapports et employees

    // public function employee(){
    //     return $this->belongsTo('App\Employee');
    // }
    
    protected $fillable = ['title' , 'path'];

    public function rapportable(){
        return $this->morphTo();
    }

    public function url(){
        return Storage::url($this->path);
    }
}
