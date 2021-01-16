<?php

namespace App\Http\Controllers;

use App\Models\CrudeSuicideRate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CrudeSuicideRateController extends Controller
{
    public function get(){
        $zero=CrudeSuicideRate::where('period','2000')->where('gender','Both sexes')->get();
        $five=CrudeSuicideRate::where('period','2005')->where('gender','Both sexes')->get();
        $ten=CrudeSuicideRate::where('period','2010')->where('gender','Both sexes')->get();
        $fifteen=CrudeSuicideRate::where('period','2015')->where('gender','Both sexes')->get();
        $sixteen=CrudeSuicideRate::where('period','2016')->where('gender','Both sexes')->get();
        return ['data'=>['zero'=>$zero,'five'=>$five,'ten'=>$ten,'fifteen'=>$fifteen,'sixteen'=>$sixteen],'columns'=>array_slice(\Schema::getColumnListing('crude_suicide_rates'),1),'categories'=>['2000','2005','2010','2015','2016']];
    }
    public function import(){
        return Excel::import(new \App\Imports\CrudeSuicideRateImport, public_path().'\assets\CrudeSuicide.xlsx');
    }
}
