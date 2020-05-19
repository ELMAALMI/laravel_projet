<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey = 'produit_id';

    
    //realtion avec table Produit et employee  many to many 
     //(les donnes sont inseré sur table_association emloyee_produit )
    public function comersialise_par()
    {
        return $this->belongsToMany('App\Employee');
                        
    }

    //
}
