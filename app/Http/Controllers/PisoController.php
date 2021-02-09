<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PisoModels;
use Illuminate\Support\Facades\Validator;
use App\Imports\Import_piso;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class PisoController extends Controller
{
    public function list_piso(){
        return view('piso/table');
        
    }
    public function get_data(){
        return DB::table('tbl_piso')->select('*')->get();
       
    }

    public function get_data_piso_filter(){
        try {
            $p 		= (float)request()->p;
            $l 		= (float)request()->l;
            $t 		= (float)request()->t;
            $p2     = (float)request()->p2;
            $l2 	= (float)request()->l2;
            $t2 	= (float)request()->t2;
           
            if($p!== (float)0 && $l!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('p', array($p, $p2))
                        ->whereBetween('l', array($l, $l2))
                        ->get();
                        
            }elseif($p!== (float)0 && $t!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('p', array($p, $p2))
                        ->whereBetween('t', array($t, $t2))
                        ->get();
                       

            }elseif($l!== (float)0 && $p!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('l', array($l, $l2))
                        ->whereBetween('p', array($p, $p2))
                        ->get();
                      

            }elseif( $l!== (float)0 && $t!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('l', array($l, $l2))
                        ->whereBetween('t', array($t, $t2))
                        ->get();
                       

            }elseif($t!== (float)0 && $p!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('t', array($t, $t2))
                        ->whereBetween('p', array($p, $p2))
                        ->get();
                        

            }elseif( $t!== (float)0 && $l!== (float)0){
                $data =  DB::table('tbl_piso')
                        ->select('*')
                        ->whereBetween('t', array($t, $t2))
                        ->whereBetween('l', array($l, $l2))
                        ->get();
                        

            }else{
                $data = DB::table('tbl_piso')->select('*')->get();
            }
            return $data;
        }catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    return $t_array;
       }

    }

    public function add_piso(){
        $data['kategori'] = DB::table('tbl_piso')->select('catagory')->distinct('catagory')->get();
        return view('piso/form',$data);
    }

    public function piso_add(){
        return PisoModels::piso_add_ok();
    }
    public function edit_piso_form(){
        $data['get']      = PisoModels::get_data_row();
        $data['kategori'] = DB::table('tbl_piso')->select('catagory')->distinct('catagory')->get();
        return view('piso/form',$data);
    }
    public function import_piso(Request $request){
         // validasi
         $validation = \Validator::make($request->all(), [
            "file" => "required|mimes:csv,xls,xlsx",
        ])->validate();
        // dd($request->all());

        // import data
        Excel::import(new Import_piso, $request->file('file'));

        // // Alert::success("Data Invoice berhasil diimpor!", "Sukses!")->autoclose(4500);
        return redirect(route('list_piso'));
    }

}