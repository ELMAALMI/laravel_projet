<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'client_id';

    //relation Avec projet many to many 
    //(un client peut demmande 1 ou plusieur projet)
    public function demmande()
    {
        return $this->hasMany('App\Projet',"client_id");
    }

}
