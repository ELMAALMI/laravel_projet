<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'job_id';

    //
    //relation avec table jobs et employees
    public function afeecter(){
        return $this->hasMany('App\Emplpoyee');
    }

    //
}
