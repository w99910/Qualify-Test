<?php

namespace App\Http\Controllers;

use App\Models\ExpectBirth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExpectBirthController extends Controller
{
    public function get(){
        $periods=ExpectBirth::distinct()->get(['period'])->shuffle()->take(5);
        $years=[];
        $gender_data=[];
        $genders=['Both sexes','Male','Female'];
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
                $temp=ExpectBirth::where(['location'=>$country,'period'=>$year,'gender'=>'Both sexes'])->first();
                if($temp!==null){
                    $array[]= (float)$temp->Tooltip;
                    $name=$temp->indicator;
                }
                else{
                    $array[]=null;
                }
            }
            $j=0;
            foreach ($genders as $gender){
                $array1=[];
                foreach ($countries as $country){
                    $temp1=ExpectBirth::where(['location'=>$country,'period'=>$year,'gender'=>$gender])->first();
                    if($temp1!==null){
                        $array1[]=(float)$temp1->Tooltip;
                    }
                    else{
                        $array1[]=null;
                    }
                }
                $gender_data[$year][$j]=[
                    'name'=> $gender,
                    'connectNulls'=>true,
                    'data'=>$array1
                ];
                $j++;
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
            'gender_data'=>$gender_data
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
        Excel::import(new \App\Imports\ExpectBirths, $req->file);
        return redirect()->back()->with(['message'=>'Success Expect']);
    }
}
