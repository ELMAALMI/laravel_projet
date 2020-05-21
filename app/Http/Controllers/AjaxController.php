<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Projet;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class AjaxController extends Controller
{
    public function projetorder()
    {
        $data = Projet::
        select(DB::raw('count(*) as nb'),DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('year','month')
           ->get();
        return json_encode($data);
    }
    public function datachiffre()
    {
      
     $data = DB::select("SELECT SUM(montements) as nb,YEAR(created_at) year,
      MONTH(created_at) month from (SELECT * from factures WHERE projet_id is NOT null)
       as a GROUP BY year,month");

       return json_encode($data); 
    }
    public function datarevenu()
    {
      
     $data = DB::select("SELECT SUM(montements) as nb,YEAR(created_at) year, MONTH(created_at) month from (SELECT * from factures WHERE projet_id is null) as a GROUP BY year,month");

       return json_encode($data); 
    }
    public function dataservice()
    {
      
     $data = DB::select("SELECT * FROM `service_types` as a INNER JOIN (SELECT service_id,COUNT(*) as nb from projets GROUP BY service_id) as b WHERE a.service_id = b.service_id");

       return json_encode($data); 
    }
}
