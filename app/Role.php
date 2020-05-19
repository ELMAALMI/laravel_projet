<?php

namespace App;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id';
//relation avec table users et roles
    public function users(){
        return $this->hasMany('App\User');
    }


    
}
