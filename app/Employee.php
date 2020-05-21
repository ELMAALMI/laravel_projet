<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['cin' , 'nom' , 'prenom' , 'sexe' ,'adresse' , 'email' ,'tele' ,'date_naissance' , 'salaire' , 'job_id'];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function stagaire(){
        return $this->hasMany('App\Stagaire');
    }

    public function job(){

        return $this->belongsTo('App\Job');
    }

    public function employeedoc(){

        return $this->hasOne('App\EmployeeDocs');
    }

    public function rapports(){
        return $this->morphMany('App\Rapport' , 'rapportable');
    }
  
    public static function boot(){
        parent::boot();
    
        static::deleting(function(Employee $employee){
            $employee->user()->delete();
            $employee->stagaire()->delete();
            // $rapport->documment()->delete();
        });


        static::updated(function(Employee $employee){
            
            $id = $employee->user->id;
            
            $user = User::findOrFail($id);
            
            $user->email = $employee->email ;
            
            $user->save();

        });

        }
}
