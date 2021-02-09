<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class PisoModels extends Model
{
	protected $table = 'tbl_piso'; 
	protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'catagory', 'p', 'l', 't',
        'description'
    ];
	public static function piso_add_ok(){
		try {
			$id 		= request()->id;
			if($id>0){
				$update = DB::table('tbl_piso')
							->where('id',$id)
							->update([
										'name'   		=>request()->name,
										'catagory'	  	=>request()->catagory,
										'p'				=>request()->p,
										'l'   			=>request()->l,
										't'	  			=>request()->t,
										'description'	=>request()->description
								]);
				$confirm1	=1;
			}else{
				$insert = DB::table('tbl_piso')
							->insert([
										'name'   		=>request()->name,
										'catagory'	  	=>request()->catagory,
										'p'				=>request()->p,
										'l'   			=>request()->l,
										't'	  			=>request()->t,
										'description'	=>request()->description
								]);
				$confirm1	=1;

			}
			if ($confirm1==1){
				$t_array['status'] 		=200;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	='';
	        }
	        return $t_array;
			
			
		} 
		catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    return $t_array;
       }
		
	}

	public static function get_data_row(){
		$id 			= request()->id;
		if ($id>0){
			$data1 = DB::table('tbl_piso')
					->select('*')
					->where('id',$id)
					->get();
			foreach ($data1 as $row) {
				$json_array['name'] 		= $row->name;
				$json_array['catagory'] 	= $row->catagory;
				$json_array['p'] 			= $row->p;
				$json_array['l'] 			= $row->l;
				$json_array['t'] 			= $row->t;
				$json_array['description'] 	= $row->description;
				$json_array['id'] 			= $row->id;
				
			}
			return $json_array;
		}
	}

}