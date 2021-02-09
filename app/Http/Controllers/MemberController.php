<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PisoModels;
use Illuminate\Support\Facades\Validator;
use App\Imports\Import_piso;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Models\Members;
class MemberController extends Controller{
    public function index(){
        $data['table']      = Members::all();
        return view('member/index',$data);

    }

    public function request_sample(Request $request){
        try {
            $data1      = $request;
            $insert = DB::table('t_request')
            ->insert([
                        'id_product'   	=>$data1['id_product'],
                        'id_size'	  	=>$data1['id_size'],
                        'province'   	=>$data1['province'],
                        'city'	=>$data1['city'],
                        'id_member'	=>$data1['id_member'],
                        'address'=>$data1['address'],
                        'note'=>$data1['note'],
                ]);

            if ($insert){
                $t_array['msg_type'] 	='success';
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function sample(){
        
        $data['table']      = Members::get_sample_request();
        return view('member/request',$data);
    }

}