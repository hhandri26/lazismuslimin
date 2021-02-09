<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
use Image;

class ConfigModels extends Model
{
	public static function delete_ok()
	{
		try {
	    	$tbl 		= request()->table;
	    	$id 		= request()->id;
	    	$refresh 	= request()->refresh;
	    	$msg_type 	='success';
	    	$msg 		='Hapus record berhasil';
	    	DB::table($tbl)->where('id', $id)->delete();
	    	$confirm1 	= 1;
	    	if ($confirm1==1){
				
	            $t_array['msg_type'] 	='success';
				$t_array['msg'] 		="Hapus record berhasil";
				if($refresh=='current'){
					$t_array['refresh'] 	='';
				}else{
					$t_array['refresh'] 	='';
				}
	            
	        }
	        return $t_array;
	    }
	    catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    $t_array['refresh'] 	='';
		    return $t_array;
       }
	}

	public static function delete_only(){
		try {
	    	$tbl 		= request()->table;
	    	$id 		= request()->id;
	    	$refresh 	= request()->refresh;
	    	$msg_type 	='success';
			$msg 		='Hapus record berhasil';
			$today 		=date("Y-m-d H:i:s");
	    	DB::table($tbl)->where('id', $id)->update(['deleted'=>$today]);
	    	$confirm1 	= 1;
	    	if ($confirm1==1){
				
	            $t_array['msg_type'] 	='success';
				$t_array['msg'] 		="Hapus record berhasil";
				if($refresh=='current'){
					$t_array['refresh'] 	='';
				}else{
					$t_array['refresh'] 	=route($refresh);
				}
	            
	        }
	        return $t_array;
	    }
	    catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    $t_array['refresh'] 	=route($refresh);
		    return $t_array;
       }

	}

	public static function delete_prv_ok()
	{
		try {
	    	$id 		= request()->id;
	    	$msg_type 	='success';
	    	$msg 		='Hapus record berhasil';
	    	DB::table('t_privileges')->where('id', $id)->delete();
	    	$confirm1 	= 1;
	    	if ($confirm1==1){
				
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Hapus record berhasil";
	        }
	        return $t_array;
	    }
	    catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    $t_array['refresh'] 	=route($refresh);
		    return $t_array;
       }
	}

	public static function select_menu_ok()
	{
		$q 		= \Request::input('q');
		return DB::table('t_menu')
			   ->select('id','menu_name as text')
			   ->where(function($query) use ($q) {
		                $query->where('menu_name', 'like', "%$q%");
		           		 })
			   ->get();
	}

	public static function user_add_ok()
	{
		try{
				
				$adddate     	= date("Y-m-d H:i:s");
				$user        	= auth()->user();
				$userid      	= $user->id;
				$id 		 	= request()->id;
				if ($id>0){
					
					$update_user = DB::table('users')
									->where('id', $id)
									->update([
									'name' 			=>request()->name,
									'email' 		=>str_replace(' ','',request()->email),
									'password' 		=>str_replace(' ','',bcrypt(request()->password)),
									'real_password'	=>str_replace(' ','',request()->password),
									'phone' 		=>request()->phone,
									'active' 		=>request()->active,
									'role' 			=>request()->role,
									'area_id' 		=>request()->area_id,
									'gender' 		=>request()->gender,
									'mobile' 		=>request()->mobile,
									'address' 		=>request()->address,
									'dob' 			=>request()->dob,
									'hometown' 		=>request()->hometown,
									'team' 			=>request()->team,
									'user_type' 	=>request()->user_type,
									]);
					$confirm1 	= 1;
					}else{
						

							$insert_user=DB::table('users')
										 ->insert([
											'name' 			=>request()->name,
											'email' 		=>str_replace(' ','',request()->email),
											'password' 		=>str_replace(' ','',bcrypt(request()->password)),
											'real_password'	=>str_replace(' ','',request()->password),
											'phone' 		=>request()->phone,
											'active' 		=>request()->active,
											'role' 			=>request()->role,
											'area_id' 		=>request()->area_id,
											'gender' 		=>request()->gender,
											'mobile' 		=>request()->mobile,
											'address' 		=>request()->address,
											'dob' 			=>request()->dob,
											'hometown' 		=>request()->hometown,
											'team' 			=>request()->team,
											'user_type' 	=>request()->user_type,
										 	
										 ]);
							$confirm1 	= 1;
							
							
							
						
				}
				if ($confirm1==1){
					$t_array['status'] 		=200;
		            $t_array['msg_type'] 	='success';
		            $t_array['msg'] 		="Simpan data berhasil..";
		            $t_array['refresh'] 	=route('user_table');
	        	}
	        	return $t_array;

			}
			catch(\Exception $e) {
				$t_array['status'] 		=400;
				$t_array['msg_type']='error';
				$t_array['msg']=$e->getMessage();
				return $t_array;
		}
	}

	public static function upload_file_ok($request)
	{
		$folder 	=Request()->folder;
		$prefik 	=Request()->prefik;
		$table 		=Request()->table;
		$field_name =Request()->field_name;
		$refresh 	= request()->refresh;
		$exst_img 	= request()->exst_img;
		$path 		=public_path('images/');
		$msg 		="Upload berhasil";
		$validator  = Validator::make($request->all(),['file[]' => 'image',],['file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)']);
		if ($validator->fails()){
			$err 		='';
			$json_array = json_decode($validator->errors(), TRUE);
			foreach ($json_array as $key => $val) {
					$err.=$val[0];
			}
			$t_array['msg_type'] 	='warning';
		    $t_array['msg'] 		=$err;
		    return $t_array;
		}else{
			$image 	='.jpg.png.bmp.jpeg.gif.tiff';
		    $dir  	=$path.$folder.'/';
		    $n 		=0;
		    foreach($request->file('file') as $file){
		    	if(is_file($file)){
		    		$filename 		= $prefik.'_'.$file->getClientOriginalName();
		    		$file->move($dir, $filename);
		    		$update_table 	= DB::table($table)
		    						  ->where('id', $prefik)
		    						  ->update([$field_name=>$filename]);
		    		$n++;
		    	}
		    }
		    $msg=$n. " file berhasil di upload ";
		}
		$t_array['refresh'] 	=route($refresh);
		$t_array['msg_type'] 	='success';
	    $t_array['msg'] 		=$msg;
	    return $t_array;

	}
	public static function upload_file_vue($request){
		try{
			
			$data = $request->all();
			$id 		= uniqid();
			$date 		= date("Y-m-d H:i:s");
			$png_url 	= "product-".time().".png";
			$folder 	= $data['folder'];
			$path 		= public_path().'/images'.'/'.$folder.'/' . $png_url;
			$file 		= $data['file'];
			$filename 	= $date.'_product_'.$id.'.png';
		
			Image::make(file_get_contents($file))->save($path);   
			$response = array(
				'status' 	=> 'success',
				'file_name' => $png_url,
				'file_path' => asset('/public/images'.'/'.$folder.'/'.$png_url)
			);
			return $response;
		} 
		catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       	}
		

	}

	public static function get_gorup_menu()
	{
		$id 			= request()->id;
		if ($id>0){
			$data1 = DB::table('t_menu')
					->select('*')
					->where('id',$id)
					->get();
			foreach ($data1 as $row) {
				$json_array['menu'] 	= $row->menu_name;
				$json_array['icon_e'] 	= $row->icon;
				$json_array['sort'] 	= $row->sort;
				$json_array['icon'] 	= DB::table('t_icon')
										  ->select('*')
									      ->get();
			}
			return $json_array;
		}else{
			$data = DB::table('t_menu')
				->select('*')
				->get();
			return $data;
		}
		
	}

	public static function users_privileges($id_user,$tbl)
	{
		$json_data 		=array();
		$json_array 	='';
		$rows 			=DB::table('t_privileges as a')
						 ->select('a.user_id','a.menu_id','b.menu_name','a.id')
						 ->leftjoin('t_menu as b','a.menu_id','=','b.id')
						 ->where('a.user_id',$id_user)
						 ->get();
		foreach ($rows as $k) {
			if($tbl=='get'){
				$json_array = '<li><span class="fa-li" ><i class="fa fa-check-square clr-green"></i></span>'.$k->menu_name;
			}
			if($tbl=='row'){
				return $rows;
			}
			array_push($json_data,$json_array);
		}
		return $json_data;
	}

	public static function get_user_prv()
	{
		$id 			=request()->id;
		$json_data 		=array();
		$json_array 	=array();
		if ($id>0){$sql2="a.id=".$id;}else{$sql2="a.id>0";}
		$data1 = DB::table('users as a')
				 ->select('a.id','a.name','a.area_id','a.gender','a.mobile','a.address','a.dob','a.hometown','a.team','a.user_type','a.team','a.company_id','a.email','a.phone','a.active','a.role','a.real_password','a.username','b.name_role')
				 ->leftjoin('t_role_user as b','a.role','=','b.id')
				 ->whereRaw($sql2)
				 ->get();
		foreach ($data1 as $row) {
			if($row->active==1){
				$act = 'Active';
			}else{
				$act = 'Not Active';
			}
			$id_user 						= $row->id;
			$json_array['id'] 				= $row->id;
			$json_array['name'] 			= $row->name;
			$json_array['username'] 		= $row->username;
			$json_array['email'] 			= $row->email;
			$json_array['phone']			= $row->phone;
			$json_array['active'] 			= $act;
			$json_array['name_role'] 		= $row->name_role;
			$json_array['real_password'] 	= $row->real_password;
			$json_array['role'] 			= $row->role;
		

		
			$json_array['gender'] 		= $row->gender;
			$json_array['mobile'] 		= $row->mobile;
			$json_array['address'] 		= $row->address;
			$json_array['dob'] 			= $row->dob;
			$json_array['hometown'] 	= $row->hometown;
		

			array_push($json_data,$json_array);
		}
		if($id>0){
			$list_array 			= $json_array;
		}else{
			return '{"data":'.json_encode($json_data).'}';
		}
		return $list_array;
			
		
	}

	public static function get_icon()
	{
		$data = DB::table('t_icon')
				->select('*')
				->get();
		return $data;
	}

	public static function menu_save_ok()
	{
		try{
			$adddate    = date("Y-m-d H:i:s");
			$user       = auth()->user();
			$addby     	= $user->id;
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_menu')
					 		  ->where('id',$id)
					 		  ->update([
					 		  			'menu_name'	=>$val['menu'],
					 		  			'icon'		=>$val['icon'],
					 		  			'sort'		=>$val['no_urut'],
					 		  			'addby'		=>$addby,
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_menu')
					 		  ->insert([
					 		  			'menu_name'	=>$val['menu'],
					 		  			'icon'		=>$val['icon'],
					 		  			'sort'		=>$val['no_urut'],
					 		  			'addby'		=>$addby,
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
				}

			}

			if ($confirm1==1){
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('menu_table');
	        }
	        return $t_array;
		}
		catch(\Exception $e) {
 		    $t_array['msg_type']='error';
		    $t_array['msg']=$e->getMessage();
		    return $t_array;
		}
	}
	// sub Menu

	public static function get_sub_menu()
	{
		$id 			= request()->id;
		if ($id>0){ $sql2="a.id=".$id;}else{$sql2="a.id>0";}		
		$data1 = DB::table('t_sub_menu as a')
				->select('a.id','a.id_menu','a.sub_menu_name as submenu','a.url','b.menu_name as menu')
				->leftjoin('t_menu as b','a.id_menu','=','b.id')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['submenu'] 	= $row->submenu;
			$json_array['id_menu'] 	= $row->id_menu;
			$json_array['menu'] 	= $row->menu;
			$json_array['url'] 		= $row->url;
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}
		
		
	}

	public static function sub_menu_save()
	{
		try{
			$adddate    = date("Y-m-d H:i:s");
			$user       = auth()->user();
			$addby     	= $user->id;
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_sub_menu')
					 		  ->where('id',$id)
					 		  ->update([
					 		  			'id_menu'		=>$val['id_menu'],
					 		  			'sub_menu_name'	=>$val['sub_menu_name'],
					 		  			'url'			=>str_replace(' ','',$val['url']),
					 		  			'addby'			=>$addby,
					 		  			'adddate' 		=>$adddate
					 		  		]);
					$confirm1	=1;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_sub_menu')
					 		  ->insert([
					 		  			'id_menu'		=>$val['id_menu'],
					 		  			'sub_menu_name'	=>$val['sub_menu_name'],
					 		  			'url'			=>str_replace(' ','',$val['url']),
					 		  			'addby'			=>$addby,
					 		  			'adddate' 		=>$adddate
					 		  		]);
					$confirm1	=1;
				}

			}

			if ($confirm1==1){
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('sub_menu_table');
	        }
	        return $t_array;
		}
		catch(\Exception $e) {
 		    $t_array['msg_type']='error';
		    $t_array['msg']=$e->getMessage();
		    return $t_array;
		}
	}

	public static function get_contact_info()
	{
		$data1 = DB::table('t_info')
				->select('*')
				->get();
		foreach ($data1 as $row) {
			$json_array['img'] 			= $row->logo;
			$json_array['email'] 		= $row->email;
			$json_array['phone'] 		= $row->phone;
			$json_array['address'] 		= $row->address;
			$json_array['facebook'] 	= $row->facebook;
			$json_array['twitter'] 		= $row->twitter;
			$json_array['instagram'] 	= $row->instagram;
			$json_array['linkedin'] 	= $row->linkedin;
			$json_array['title'] 		= $row->title;
			$json_array['decription'] 	= $row->decription;
			$json_array['keywords'] 	= $row->keywords;
			$json_array['tag'] 			= $row->tag;
			$json_array['maps'] 		= $row->maps;
			$json_array['copyright'] 	= $row->copyright;

		}
		return $json_array;
	}

	public static function info_update_ok()
	{
		try{
			
			$data       = request()->data;
			$json_array = json_decode($data, TRUE);
			
			foreach ($json_array as $key => $val){
				$update = DB::table('t_info')
				 		  ->where('id',1)
				 		  ->update([
				 		  			'email'		=>$val['email'],
				 		  			'phone'		=>$val['phone'],
				 		  			'address'	=>$val['address'],
				 		  			'facebook'	=>$val['facebook'],
				 		  			'twitter'	=>$val['twitter'],
				 		  			'instagram'	=>$val['instagram'],
				 		  			'linkedin'	=>$val['linkedin'],
				 		  			'title'		=>$val['title'],
				 		  			'decription'=>$val['decription'],
				 		  			'keywords'	=>$val['keywords'],
				 		  			'tag'		=>$val['tag'],
				 		  			'maps'		=>$val['maps'],
				 		  			'copyright'	=>$val['copyright']
				 		  		]);
				$confirm1	=1;
			}	

			if ($confirm1==1){
				$t_array['sid'] 		= '1';
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	= route('info_form');
	        }
	        return $t_array;
		}
		catch(\Exception $e) {
 		    $t_array['msg_type']='error';
		    $t_array['msg']=$e->getMessage();
		    return $t_array;
		}
	}

	public static function update_rule_ok($request)
	{
		$update = DB::table('tb_rule')->where('id',1)->update(['rule' => $request['rule']]);
	}

	public static function get_menu()
	{
		return DB::table('t_menu')->select('*')->get();

	}

	public static function get_table_role()
	{
		return DB::table('t_role_user')->select('*')->get();
	}

	public static function get_sub_menu_all()
	{
		return DB::table('t_sub_menu')->select('*')->where('id_menu',$id_menu)->get();
	}

	public static function save_role()
	{
		try{
            $id 		= request()->id;
			$today 		=date("Y-m-d H:i:s");
			$menu 		= request()->menu_id;
			$sub_menu   = request()->id_sub_menu;
			$add   		= request()->add;
			$edit   	= request()->edit;
			$deleted   	= request()->deleted;
			$menu_id_2  = request()->menu_id_2;
			if($id>0){
				
				$update = DB::table('t_role_user')
							->where('id',$id)
							->update([
										'name_role'   	=>request()->name_role,
										'desc'	  	    =>request()->desc,
										'date_created'	=>$today
								]);
				$confirm1	=1;
				// deletet_privileges
				$delete_prv =DB::table('t_privileges')->where('role_id', $id)->delete();
				// t_privileges_sub
				$delete_prv =DB::table('t_privileges_sub')->where('role_id', $id)->delete();
				// get id role
				$get_id 	=DB::table('t_role_user')->where('date_created',$today)->pluck('id')->first();				

			}else{			
								
				$insert = DB::table('t_role_user')
							->insert([
                                        'name_role'   =>request()->name_role,
                                        'desc'	  	    =>request()->desc,
                                        'date_created'	=>$today
								]);
				$confirm1	=1;
				$get_id 	=DB::table('t_role_user')->where('date_created',$today)->pluck('id')->first();
				
			}
			// insert table t_privileges
			if(!empty($menu)){
				$count_menu = count($menu);
				for($i=0; $i < $count_menu;$i++){
					$insert_menu = DB::table('t_privileges')
									->insert([
												'role_id'   =>$get_id,
												'menu_id'	=>$menu[$i],
										]);
					
	
				}

			}
			// insert sub privilages
			if(!empty($sub_menu)){
				$count_sub 	= count($sub_menu);
				for($k=0; $k < $count_sub;$k++){
					$insert_menu = DB::table('t_privileges_sub')
							->insert([
										'role_id'  	 	=>$get_id,
										'menu_id'		=>$menu_id_2[$k],
										'sub_menu_id'	=>$sub_menu[$k],
										'add'			=>$add[$k],
										'edit'			=>$edit[$k],
										'deleted'		=>$deleted[$k],
								]);

				}

			}
			
			
            
			if ($confirm1==1){
				$t_array['status'] 		=200;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('role_table');
	        }
	        return $t_array;
		}
		catch(\Exception $e) {
 		    $t_array['msg_type']='error';
		    $t_array['msg']=$e->getMessage();
		    return $t_array;
		}

	}

	public static function delete_role()
	{
		try {
	    	$id 		= request()->id;
	    	$msg_type 	='success';
	    	$msg 		='Hapus record berhasil';
			DB::table('t_role_user')->where('id', $id)->delete();
			// deletet_privileges
			DB::table('t_privileges')->where('role_id', $id)->delete();
			// t_privileges_sub
			DB::table('t_privileges_sub')->where('role_id', $id)->delete();
	    	$confirm1 	= 1;
	    	if ($confirm1==1){
	            $t_array['msg_type'] 	='success';
				$t_array['msg'] 		="Hapus record berhasil";
				$t_array['refresh'] 	='';
	        }
	        return $t_array;
	    }
	    catch(\Exception $e) {
		    $t_array['msg_type'] 	='error';
		    $t_array['msg'] 		=$e->getMessage();
		    $t_array['refresh'] 	=route($refresh);
		    return $t_array;
       }

	}

	public static function get_role_edit()
	{
		$id 		= request()->id;
		$data1 = DB::table('t_role_user')
				->select('*')
				->where('id',$id)
				->get();
		foreach ($data1 as $row) {
			$json_array['id'] 		= $row->id;
			$json_array['name_role']= $row->name_role;
			$json_array['desc'] 	= $row->desc;
		}
		
		return $json_array;
		

	}

	public static function post_base_64($request)
	{
		$data = $request->all();

		//var_dump($data['file']);die();
		$id 		= uniqid();
		$date 		= date("Y-m-d H:i:s");
		$png_url 	= "visitor-".time().".png";
		$path 		= public_path().'/img/visitor/' . $png_url;
		$pp 		= '/img/visitor/' . $png_url;
		$file 		= $data['file'];
		$filename 	= $date.'_visitor_'.$id.'.png';
	
		Image::make(file_get_contents($file))->save($path);
		//$file->move($path, $path);     
		$response = array(
			'status' 	=> 'success',
			'location'  => $pp	
		);
		return $response;
		
	}


}
