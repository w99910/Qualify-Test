<?php

namespace App\Imports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\ToModel;

class DoctorImport implements ToModel
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
        return new Doctor([
            'location'=>$row[0],
            'period'=>$row[1],
            'indicator'=>$row[2],
            'Tooltip'=>$row[3],
        ]);
    }
}
