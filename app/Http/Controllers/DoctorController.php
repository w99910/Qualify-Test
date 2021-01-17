<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DoctorController extends Controller
{
    public function get(){
        $zero=Doctor::where('period','2000')->get();
        $two=Doctor::where('period','2002')->get();
        $four=Doctor::where('period','2004')->get();
        $five=Doctor::where('period','2005')->get();
        $six=Doctor::where('period','2006')->get();
        $seven=Doctor::where('period','2007')->get();
        $eight=Doctor::where('period','2008')->get();
        $nine=Doctor::where('period','2009')->get();
        $ten=Doctor::where('period','2010')->get();
        $eleven=Doctor::where('period','2011')->get();
        $twelve=Doctor::where('period','2012')->get();
        $thirteen=Doctor::where('period','2013')->get();
        $fourteen=Doctor::where('period','2014')->get();
        $fifteen=Doctor::where('period','2015')->get();
        $sixteen=Doctor::where('period','2016')->get();
        $seventeen=Doctor::where('period','2017')->get();
        return [
            'data'=>
                [
                    'zero'=>$zero,
                    'two'=>$two,
                    'four'=>$four,
                    'five'=>$five,
                    'six'=>$six,
                    'seven'=>$seven,
                    'eight'=>$eight,
                    'nine'=>$nine,
                    'ten'=>$ten,
                    'eleven'=>$eleven,
                    'twelve'=>$twelve,
                    '$thirteen'=>$thirteen,
                    '$fourteen'=>$fourteen,
                    'fifteen'=>$fifteen,
                    'sixteen'=>$sixteen,
                    'seventeen'=>$seventeen,
                ],
            'columns'=>
                array_slice(\Schema::getColumnListing('expect_births'),1),
            'categories'=>
                [
                    '2000','2002','2004','2005','2006','2007','2008','2009','2010',
                    '2011','2012','2013','2014','2015','2016','2017',
                ]
        ];
    }
    public function import(){
        Excel::import(new \App\Imports\DoctorImport, public_path().'\assets\medicalDoctors.xlsx');
        dd('success');
    }
}
