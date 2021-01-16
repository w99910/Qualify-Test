<?php

namespace App\Http\Controllers;

use App\Models\ExpectBirth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExpectBirthController extends Controller
{
    public function get(){
        $zero=ExpectBirth::where('period','2000')->where('gender','Both sexes')->get();
        $ten=ExpectBirth::where('period','2010')->where('gender','Both sexes')->get();
        $fifteen=ExpectBirth::where('period','2015')->where('gender','Both sexes')->get();
        $ninteen=ExpectBirth::where('period','2019')->where('gender','Both sexes')->get();
        return ['data'=>['zero'=>$zero,'ten'=>$ten,'fifteen'=>$fifteen,'ninteen'=>$ninteen],'columns'=>array_slice(\Schema::getColumnListing('expect_births'),1),'categories'=>['2000','2010','2015','2019']];
    }
    public function import(){
        Excel::import(new \App\Imports\ExpectBirths, public_path().'\assets\lifeExpectancyAtBirth.xlsx');
       dd('success');
    }
}
