<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduleModels;
use Illuminate\Support\Facades\Validator;
use App\Imports\Import_piso;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ScheduleController extends Controller
{
    public function project(){
        return view('schedule/project');
        
    }
    public function get_data_project(){
        return SheduleModels::all();
       
    }

    public function get_data_project_filter(){

    }

    public function add_project(){
        return view('schedule/form');

    }
}