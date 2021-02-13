<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class HomeModels extends Model
{
    public static function get_slideshow(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_slideshow')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']       = $row->id;
            $json_array['title']    = $row->title;
            $json_array['img']      = $row->img;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}
    }

    public static function add_slideshow(){
        try{
			$adddate    = date("Y-m-d H:i:s");
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_slideshow')
					 		  ->where('id',$id)
					 		  ->update([
					 		  			'title'		=>$val['title'],
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$id_article = $id;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_slideshow')
					 		  ->insert([
                                        'title'		=>$val['title'],
                                        'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$cari_id = DB::table('t_slideshow')
							   ->select('id')
							   ->where('adddate', $adddate)
							   ->get();
					foreach ($cari_id as $row) {
						$id_article = $row->id;
					}
				}

			}

			if ($confirm1==1){
				$t_array['sid'] 		= $id_article;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('slideshow');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }
    }

    public static function get_product(){
        $id 			= request()->id;
        if($id>0){
            $data1 = DB::table('t_post_project')
                ->select('*')
				->where('id',$id)
				->first();
			$data3 = DB::table('t_product_gallery')
			->select('*')
			->where('id_product',$id)
			->get();
           if(is_null($data3)){
			   $data3 = array();
		   }
            
			$json_array['data1'] = $data1;
			$json_array['data3'] = $data3;

            
            return $json_array;

        }else{
            $data1 = DB::table('t_post_project')
				->select('*')
				->where('type','SEDEKAH')
                ->get();
            
                return $data1;

        }	
		
		
		

	}
	public static function get_acara(){
        $id 			= request()->id;
        if($id>0){
            $data1 = DB::table('t_post_project')
                ->select('*')
				->where('id',$id)
                ->first();
           
            
            $json_array['data1'] = $data1;

            
            return $json_array;

        }else{
            $data1 = DB::table('t_post_project')
				->select('*')
				->where('type','ACARA')
                ->get();
            
                return $data1;

        }	
		
		
		

    }
    public static function add_product($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
            $id 		= $request->id;
            $data1      = $request->data1;
            $data3      = $request->data3;
		
            if($id!==null){
                $insert = DB::table('t_post_project')
                            ->where('id',$id)
							->update([
                                        'img'   	=>$data1['img'],
                                        'title'	  	=>$data1['title'],
                                        'desc'   	=>$data1['desc'],                                      
										'location'	=>$data1['location'],
										'type'	=>$data1['type'],
                                        'created_at'=>$adddate
                                ]);
				$insert2 = DB::table('tbl_donasi')
						->where('id_donasi',$id)
						->update([
								'judul_donasi'	  	=>$data1['title'],
								'deskripsi'   	=>$data1['desc'],                                      
								'gambar_donasi'	=>$data1['img']
							]);
				$get_id = $id;
				$delete2 =DB::table('t_product_gallery')->where('id_product', $id)->delete();
             

            }else{
                
                $insert = DB::table('t_post_project')
							->insert([
                                        'img'   	=>$data1['img'],
                                        'title'	  	=>$data1['title'],
                                        'desc'   	=>$data1['desc'],                                      
										'location'	=>$data1['location'],
										'type'	=>$data1['type'],
                                        'created_at'=>$adddate
								]);
                $get_id 	=DB::table('t_post_project')->where('created_at',$adddate)->pluck('id')->first();
                $insert2 = DB::table('tbl_donasi')
							->insert([
                                        'id_donasi'   	=>$get_id,
                                        'judul_donasi'	  	=>$data1['title'],
                                        'deskripsi'   	=>$data1['desc'],                                      
										'gambar_donasi'	=>$data1['img']
								]);

			}
			
			if(!empty($data3)){
                foreach($data3 as $row){
                  
                        DB::table('t_product_gallery')
							->insert([
                                    'id_product'   	=>$get_id ,
                                    'img'	  	    =>$row['img'],
                                    'title'   	    =>$row['title'],
                                    'location'	    =>$row['location'],
								]);

                    
                }
            }
           
			
		

			if ($insert){
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('product');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }


	}
	
	public static function add_acara($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
            $id 		= $request->id;
            $data1      = $request->data1;
            $data2      = $request->data2;
            $data3      = $request->data3;
            if($id!==null){
                $insert = DB::table('t_post_project')
                            ->where('id',$id)
							->update([
                                        'img'   	=>$data1['img'],
                                        'title'	  	=>$data1['title'],
                                        'desc'   	=>$data1['desc'],                                      
										'location'	=>$data1['location'],
										'type'	=>$data1['type'],
                                        'created_at'=>$adddate
                                ]);
				$insert2 = DB::table('tbl_acara')
							->where('id_acara',$id)
							->update([
									'judul_acara'	 =>$data1['title'],
									'deskripsi'   	=>$data1['desc'],                                      
									'gambar_acara'	=>$data1['img']
								]);
				$get_id = $id;
				$delete2 =DB::table('t_product_gallery')->where('id_product', $id)->delete();
             

            }else{
                
                $insert = DB::table('t_post_project')
							->insert([
                                        'img'   	=>$data1['img'],
                                        'title'	  	=>$data1['title'],
                                        'desc'   	=>$data1['desc'],                                      
										'location'	=>$data1['location'],
										'type'	=>$data1['type'],
                                        'created_at'=>$adddate
								]);
                $get_id 	=DB::table('t_post_project')->where('created_at',$adddate)->pluck('id')->first();
                
				$insert2 = DB::table('tbl_acara')
				->insert([
					'id_acara'	  	=>$get_id,
						'judul_acara'	  	=>$data1['title'],
						'deskripsi'   	=>$data1['desc'],                                      
						'gambar_acara'	=>$data1['img']
					]);
			}
			
			if(!empty($data3)){
                foreach($data3 as $row){
                  
                        DB::table('t_product_gallery')
							->insert([
                                    'id_product'   	=>$get_id ,
                                    'img'	  	    =>$row['img'],
                                    'title'   	    =>$row['title'],
                                    'location'	    =>$row['location'],
								]);

                    
                }
            }
           
			
		

			if ($insert){
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('acara');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }


    }

    public static function get_whyus(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_why_us')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']           = $row->id;
            $json_array['title']        = $row->title;
            $json_array['title_number'] = $row->title_number;
            $json_array['title_desc']   = $row->title_desc;
            $json_array['desc']         = $row->desc;
            $json_array['desc_eng']     = $row->desc_eng;
            $json_array['bg']           = $row->bg;
            $json_array['img']          = $row->img;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}

    }

    public static function whyus_add($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_why_us')
					 		  ->where('id',$id)
					 		  ->update([
                                           'title'		=>$val['title'],
                                           'title_number'		=>$val['title_number'],
                                           'title_desc'		=>$val['title_desc'],
                                           'desc'		=>$val['desc'],
                                           'desc_eng'		=>$val['desc_eng'],
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$id_article = $id;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_why_us')
					 		  ->insert([
                                        'title'		=>$val['title'],
                                        'title_number'		=>$val['title_number'],
                                        'title_desc'		=>$val['title_desc'],
                                        'desc'		=>$val['desc'],
                                        'desc_eng'		=>$val['desc_eng'],
                                        'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$cari_id = DB::table('t_why_us')
							   ->select('id')
							   ->where('adddate', $adddate)
							   ->get();
					foreach ($cari_id as $row) {
						$id_article = $row->id;
					}
				}

			}

			if ($confirm1==1){
				$t_array['sid'] 		= $id_article;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('why_us');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }

    }

    public static function get_binefit(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_benefit')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']           = $row->id;
            $json_array['title']        = $row->title;
            $json_array['desc']         = $row->desc;
            $json_array['desc_eng']     = $row->desc_eng;
            $json_array['img']          = $row->img;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}

    }

    public static function add_binefit($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_benefit')
					 		  ->where('id',$id)
					 		  ->update([
                                           'title'		=>$val['title'],
                                        
                                           'desc'		=>$val['desc'],
                                           'desc_eng'		=>$val['desc_eng'],
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$id_article = $id;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_benefit')
					 		  ->insert([
                                        'title'		=>$val['title'],
                                        
                                        'desc'		=>$val['desc'],
                                        'desc_eng'		=>$val['desc_eng'],
                                        'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$cari_id = DB::table('t_benefit')
							   ->select('id')
							   ->where('adddate', $adddate)
							   ->get();
					foreach ($cari_id as $row) {
						$id_article = $row->id;
					}
				}

			}

			if ($confirm1==1){
				$t_array['sid'] 		= $id_article;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('binefit');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }

    }

    public static function get_project(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_past_project')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']           = $row->id;
            $json_array['title']        = $row->title;
            $json_array['desc']         = $row->desc;
            $json_array['desc_eng']     = $row->desc_eng;
            $json_array['img']          = $row->img;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}

	}
	
	public static function get_order_form(){
		$id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_transaction_header')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']       = $row->id;
			$json_array['status']   = $row->status;
          
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}
		
	}

    public static function add_project($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_past_project')
					 		  ->where('id',$id)
					 		  ->update([
                                           'title'		=>$val['title'],
                                        
                                           'desc'		=>$val['desc'],
                                           'desc_eng'		=>$val['desc_eng'],
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$id_article = $id;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_past_project')
					 		  ->insert([
                                        'title'		=>$val['title'],
                                        
                                        'desc'		=>$val['desc'],
                                        'desc_eng'		=>$val['desc_eng'],
                                        'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$cari_id = DB::table('t_past_project')
							   ->select('id')
							   ->where('adddate', $adddate)
							   ->get();
					foreach ($cari_id as $row) {
						$id_article = $row->id;
					}
				}

			}

			if ($confirm1==1){
				$t_array['sid'] 		= $id_article;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('project');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }

    }

    public static function get_gallery(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_gallery')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']           = $row->id;
            $json_array['title']        = $row->title;
            $json_array['desc']         = $row->desc;
            $json_array['desc_eng']     = $row->desc_eng;
            $json_array['img']          = $row->img;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}

    }

    public static function add_gallery($request){
        try{
			$adddate    = date("Y-m-d H:i:s");
			$data       = request()->data;
			$id 		= request()->id;
			$json_array = json_decode($data, TRUE);
			if ($id>0){
				foreach ($json_array as $key => $val){
					$update = DB::table('t_gallery')
					 		  ->where('id',$id)
					 		  ->update([
                                           'title'		=>$val['title'],
                                        
                                         
					 		  			'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$id_article = $id;
				}

			}else{			
				foreach ($json_array as $key => $val){					
					$insert = DB::table('t_gallery')
					 		  ->insert([
                                        'title'		=>$val['title'],
                                        
                                      
                                        'adddate' 	=>$adddate
					 		  		]);
					$confirm1	=1;
					$cari_id = DB::table('t_gallery')
							   ->select('id')
							   ->where('adddate', $adddate)
							   ->get();
					foreach ($cari_id as $row) {
						$id_article = $row->id;
					}
				}

			}

			if ($confirm1==1){
				$t_array['sid'] 		= $id_article;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('project');
	        }
	        return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type']='error';
           $t_array['msg']=$e->getMessage();
           return $t_array;
       }

    }

    public static function get_contact_info(){
        $id 			= request()->id;
		if ($id>0){ $sql2="id=".$id;}else{$sql2="id>0";}		
		$data1 = DB::table('t_contact_info')
                ->select('*')
				->whereRaw($sql2)
				->get();
		foreach ($data1 as $row) {
			$json_array['id']           = $row->id;
            $json_array['title']        = $row->title;
            $json_array['title_desc']        = $row->title_desc;
            $json_array['desc']         = $row->desc;
            $json_array['title_desc_eng']     = $row->title_desc_eng;
            $json_array['desc_eng']     = $row->desc_eng;
            $json_array['link']          = $row->link;
			
		}
		if($id>0){
			return $json_array;
		}else{
			return $data1;
		}

    }

    public static function add_contact_info(){
        try{
            $id 		= request()->id;
            $today 		=date("Y-m-d H:i:s");
			if ($id>0){
				$update = DB::table('t_contact_info')
							->where('id',$id)
							->update([
										'title'    	=>request()->title,
										'title_desc'	  	    =>request()->title_desc,
										'desc'  	=>request()->desc,
										'title_desc_eng'     	=>request()->title_desc_eng,
                                        'desc_eng'	=>request()->desc_eng,
                                        'link'	=>request()->link
								]);
				$confirm1	=1;				

			}else{			
								
				$insert = DB::table('t_contact_info')
							->insert([
                                    'title'    	=>request()->title,
                                    'title_desc'	  	    =>request()->title_desc,
                                    'desc'  	=>request()->desc,
                                    'title_desc_eng'     	=>request()->title_desc_eng,
                                    'desc_eng'	=>request()->desc_eng,
                                    'link'	=>request()->link
								]);
				$confirm1	=1;
				
            }
            
			if ($confirm1==1){
				$t_array['status'] 		=200;
	            $t_array['msg_type'] 	='success';
	            $t_array['msg'] 		="Simpan data berhasil..";
	            $t_array['refresh'] 	=route('contact_info');
	        }
	        return $t_array;
		}
		catch(\Exception $e) {
 		    $t_array['msg_type']='error';
		    $t_array['msg']=$e->getMessage();
		    return $t_array;
		}
    }
  
}
