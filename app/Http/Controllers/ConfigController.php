<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigModels;
use App\Models\MenuModels;
use App\Models\SubMenuModels;
use Illuminate\Support\Facades\Validator;
use DB;
use Image;
class ConfigController extends Controller
{

	public function delete()
	{
		return ConfigModels::delete_ok();
	}

	public function upload_file_vue(Request $request){
		return ConfigModels::upload_file_vue($request);
	}

	public function delete_only(){
		return ConfigModels::delete_only();

	}

	public function upload_file(Request $request)
	{
		return ConfigModels::upload_file_ok($request);
	}

	// menu
	public function menu_table()
	{
		$groupmenu      =ConfigModels::get_gorup_menu();
        return view('menu/index', compact('groupmenu'));
	}

	public function menu_form()
	{
		$icon 			=ConfigModels::get_icon();
		return view('menu/form', compact('icon'));
	}

	public function menu_add(Request $request)
	{
		return ConfigModels::menu_save_ok();
	}

	public function menu_edit()
	{
		$data 		=ConfigModels::get_gorup_menu();
        return view('menu/form', $data);

	}
	// sub Menu

	public function sub_menu_table()
	{
		$data['get']      =ConfigModels::get_sub_menu();
        return view('sub_menu/table',$data);
	}

	public function sub_menu_form()
	{
		$groupmenu      =ConfigModels::get_gorup_menu();
		return view('sub_menu/form', compact('groupmenu'));
	}

	public function sub_menu_add(Request $request)
	{
		return ConfigModels::sub_menu_save();
	}

	public function sub_menu_edit()
	{
		$data['get']      	=ConfigModels::get_sub_menu();
		$data['groupmenu'] 	=DB::table('t_menu')
							 ->select('*')
							 ->get();
		return view('sub_menu/form',$data);
	}

	public function user_list()
	{
		return ConfigModels::get_user_prv();
	}

	public function user_table()
	{
		return view('users/table');
	}

	public function user_form()
	{
		$data['role'] 	= DB::table('t_role_user')->select('*')->get();
        return view('users/form',$data);
	}

	public function select_menu()
	{
		return ConfigModels::select_menu_ok();
	}

	public function user_add()
	{
		return ConfigModels::user_add_ok();
	}

	public function user_edit()
	{
	
		$data['role'] 	=  DB::table('t_role_user')->select('*')->get();
		$data['get']      	=ConfigModels::get_user_prv();
        return view('users/form',$data);
	}

	public function delete_prv()
	{
		return ConfigModels::delete_prv_ok();
	}

	public function info_form()
	{
		$data['get']      	=ConfigModels::get_contact_info();
        return view('info/form',$data);
	}

	public function info_update()
	{
		return ConfigModels::info_update_ok();
	}

	public function rule_table()
	{
		$data['rule']      	= DB::table('tb_rule')->where('id','1')->pluck('rule')->first();
        return view('rule/form',$data);
	}

	public function update_rule(Request $request)
	{
		if(ConfigModels::update_rule_ok($request)){
            $request->session()->flash('success', 'Data berhasil di tambahkan');
            return redirect()->route("rule_table");            
        }else{
            $request->session()->flash('field', 'Data gagal tambahkan');
            return redirect()->route("rule_table");  

        }
	}

	public function get_menu(){
		return ConfigModels::get_menu();
	}

	public function get_sub_menu(){
		return ConfigModels::get_sub_menu();
	}

	public function role_table()
	{
		$data['table'] =ConfigModels::get_table_role(); 
		return view('role_user/table',$data);

	}

	public function role_list()
	{
		return ConfigModels::get_role_prv();		

	}

	public function role_form()
	{
		return view('role_user/form');

	}

	public function role_add()
	{
		return ConfigModels::save_role();

	}

	public function role_edit()
	{
		$data['get']      	=ConfigModels::get_role_edit();
		return view('role_user/form',$data);

	}

	public function role_deleted()
	{
		return ConfigModels::delete_role();
	}

	public function upload_file_base64(Request $request)
	{
		return ConfigModels::post_base_64($request);
	} 
	// api
	public function upload_foto(Request $request){
		// var_dump($request->hasFile('file'));die();
		 if(!$request->hasFile('file')) {
			 return response()->json(['upload_file_not_found'], 400);
		 }
		 $data = $request->all();
 
		 //var_dump($data['file']);die();
		 $id 		= uniqid();
		 $date 		= date("Y-m-d H:i:s");
		 $png_url 	= "visitor-".time().".png";
		 $path 		= public_path().'/img/foto/' . $png_url;
		 $pp 		= url('public/img/foto/'.$png_url);
		 $file 		= $data['file'];
		 $filename 	= $date.'_foto_'.$id.'.png';
	 
		 Image::make(file_get_contents($file))->save($path);
		 //$file->move($path, $path);     
		 $response = array(
			 'status' 	=> 'success',
			 'location'  => $pp	
		 );
		 return $response;
 
	 }
	
}