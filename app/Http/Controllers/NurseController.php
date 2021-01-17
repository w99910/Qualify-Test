<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NurseController extends Controller
{
    public function get(){
        $zero=Nurse::where('period','2000')->get();
        $two=Nurse::where('period','2002')->get();
        $four=Nurse::where('period','2004')->get();
        $five=Nurse::where('period','2005')->get();
        $six=Nurse::where('period','2006')->get();
        $seven=Nurse::where('period','2007')->get();
        $eight=Nurse::where('period','2008')->get();
        $nine=Nurse::where('period','2009')->get();
        $ten=Nurse::where('period','2010')->get();
        $eleven=Nurse::where('period','2011')->get();
        $twelve=Nurse::where('period','2012')->get();
        $thirteen=Nurse::where('period','2013')->get();
        $fourteen=Nurse::where('period','2014')->get();
        $fifteen=Nurse::where('period','2015')->get();
        $sixteen=Nurse::where('period','2016')->get();
        $seventeen=Nurse::where('period','2017')->get();
        $eighteen=Nurse::where('period','2018')->get();
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
                    'eighteen'=>$eighteen,
                ],
            'columns'=>
                array_slice(\Schema::getColumnListing('expect_births'),1),
            'categories'=>
                [
                    '2000','2002','2004','2005','2006','2007','2008','2009','2010',
                    '2011','2012','2013','2014','2015','2016','2017','2018'
                ]
        ];
    }
    public function import(){
        Excel::import(new \App\Imports\NurseImport, public_path().'\assets\NursingAndMidWife.xlsx');
        dd('success');
    }
}
