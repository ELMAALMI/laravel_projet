
<?php




use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'employee_id';
    //relation avec table stagaires et employees
    public function stagaires()
    {
        return $this->hasMany('App\Stagaire');
    }

    //realtion avec table Produit et employee  many to many 
     //(les donnes sont inseré sur table_association emloyee_produit )
    public function produits()
    {
        return $this->belongsToMany('App\Produit');
    }
//relation avec table rapports et employees
    public function rediger()
    {
        return $this->hasMany('App\Rapport');
    }
//relation avec table jobs et employees
    public function avoirjob()
    {
        return $this->belongsTo('App\Job');
    }
//relation avec table users et employees
    public function hasaccount()
    {
        return $this->HasOne('App\User');
    }

    

    
}
