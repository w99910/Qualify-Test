<?php

namespace App\Imports;

use App\Models\CrudeSuicideRate;
use Maatwebsite\Excel\Concerns\ToModel;

class CrudeSuicideRateImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($row[0]==='Location') {
            return null;
        }
        return new CrudeSuicideRate([
            'location'=>$row[0],
            'period'=>$row[1],
            'indicator'=>$row[2],
            'gender'=>$row[3],
            'Tooltip'=>$row[4],
        ]);
    }
}
