<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NurseController extends Controller
{
    public function get(){
        $periods=Nurse::distinct()->inRandomOrder()->get(['period'])->take(5);
        $years=[];
        foreach ($periods->sortDesc() as $period){
            $years[]=$period->period;
        }
        $countries=['Brunei Darussalam','Cambodia','Indonesia',
            "Lao People's Democratic Republic",'Malaysia','Myanmar'
            ,'Philippines','Singapore','Thailand','Viet Nam'];
        $formatted_countries=[];
        $i=0;
        foreach($years as $year){
            $array=[];
            foreach ($countries as $country){
                $temp=Nurse::where(['location'=>$country,'period'=>$year])->first();
                if($temp!==null){
                    $array[]= (float)$temp->Tooltip;
                    $name=$temp->indicator;
                }
                else{
                    $array[]=null;
                }
            }

            $formatted_countries[$i]=[
                'name'=>$year,
                'connectNulls'=>true,
                'data'=>$array];
            $i++;
        }
        return [
            'data'=>$formatted_countries,
            'title'=>$name,
            'categories'=>$countries,
            'name'=>'ToolTip',
            'years'=>$years,
        ];
    }
    public function import(Request $req){
        $validator=\Validator::make([
            'file'=>$req->file,
            'extension'=>strtolower($req->file->getClientOriginalExtension())
        ],[
            'file'=>'required',
            'extension'=>'required|in:csv,xlsx'
        ]);
        Excel::import(new \App\Imports\NurseImport, $req->file);
        return redirect()->back()->with(['message'=>'Success Nurse']);
    }
}
