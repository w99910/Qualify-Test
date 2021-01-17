<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PharmacistController extends Controller
{
    public function get(){

    }
    public function import(){
        Excel::import(new \App\Imports\PharmacistImport, public_path().'\assets\pharmacists.xlsx');
        dd('success');
    }
}
