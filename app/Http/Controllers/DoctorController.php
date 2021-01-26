<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DoctorController extends Controller
{
    public function get(){
        $periods=Doctor::distinct()->get(['period'])->shuffle()->take(5);
        $years=[];
        foreach ($periods->sortDesc() as $period){
            $years[]=$period->period;
        }
        $countries=['Brunei Darussalam','Cambodia','Indonesia',
            "Lao People's Democratic Republic",'Malaysia','Myanmar'
            ,'Philippines','Singapore','Thailand','Viet Nam'];
        $formatted_countries=[];
        $pie_drillDown=[];
        $pie_name=[];
        $i=0;
        foreach($years as $year){
            $total=0;
            $array=[];
            $pie_data=[];
            foreach ($countries as $country){
                $temp=Doctor::where(['location'=>$country,'period'=>$year])->first();
                if($temp!==null){
                    $array[]= (float)$temp->Tooltip;
                    $name=$temp->indicator;
                     $pie_data[]=[
                         $country,
                         (float)$temp->Tooltip
                     ];
                     $total+=(float)$temp->Tooltip;
                }
                else{
                    $pie_data[]=[
                        $country,
                        null
                    ];
                    $array[]=null;
                }
            }
            $pie_name[]=[
              'name'=>$year,
              'y'=>$total,
              'drilldown'=>$year,
            ];
            $pie_drillDown[$i]=[
                'name'=>$year,
                'id'=>$year,
                'data'=>$pie_data,
            ];

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
            'pie_series'=>$pie_drillDown,
            'pie_name'=>$pie_name,
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
        Excel::import(new \App\Imports\DoctorImport, $req->file);
        return redirect()->back()->with(['message'=>'Doctor Success']);
    }
}
