<?php

namespace App\Imports;

use App\Email;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportEmail implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Email([
            'mail'     => $row[0],
        ]);
    }
}
