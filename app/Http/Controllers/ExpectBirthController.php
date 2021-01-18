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
        Excel::import(new \App\Imports\ExpectBirths, $req->file);
        return redirect()->back()->with(['message'=>'Success Expect']);
    }
}
