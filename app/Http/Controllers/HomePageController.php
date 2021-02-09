<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models\HomeModels;

class HomePageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function slideshow(){
        $data['table']      = HomeModels::get_slideshow();
        return view('slideshow/table',$data);
    }

    public function slideshow_form(){
        return view('slideshow/form');

    }
    public function slideshow_add(){
        return HomeModels::add_slideshow();
    }

    public function slideshow_form_edit(){
        $data['get']      = HomeModels::get_slideshow();
        return view('slideshow/form',$data);

    }

    public function product(){
        $data['table']      = HomeModels::get_product();
        return view('product/table',$data);
    }

    public function product_form(){
        return view('product/form');

    }
    public function product_add(Request $request){
        return HomeModels::add_product($request);
    }

    public function product_form_edit(){
        $data['get']      = HomeModels::get_product();
        return view('product/form',$data);

    }

    public function product_edit(){
        return HomeModels::get_product();

    }

    public function why_us(){
        $data['table']      = HomeModels::get_whyus();
        return view('why_us/index',$data);

    }

    public function form_why_us(){
        $data['get']      = HomeModels::get_whyus();
        return view('why_us/form',$data);

    }

    public function whyus_add(Request $request){
        return HomeModels::whyus_add($request);

    }

    public function binefit(){
        $data['table']      = HomeModels::get_binefit();
        return view('binefit/index',$data);

    }

    public function binefit_form(){
        $data['get']      = HomeModels::get_binefit();
        return view('binefit/form',$data);

    }

    public function binefit_add(Request $request){
        return HomeModels::add_binefit($request);

    }

    public function project(){
        $data['table']      = HomeModels::get_project();
        return view('project/index',$data);

    }

    public function project_form(){
        $data['get']      = HomeModels::get_project();
        return view('project/form',$data);

    }

    public function project_add(Request $request){
        return HomeModels::add_project($request);

    }

    public function gallery(){
        $data['table']      = HomeModels::get_gallery();
        return view('gallery/index',$data);

    }
    public function gallery_form(){
        $data['get']      = HomeModels::get_gallery();
        return view('gallery/form',$data);

    }
    public function gallery_add(Request $request){
        return HomeModels::add_gallery($request);
      

    }

    public function contact_info(){
        $data['table']      = HomeModels::get_contact_info();
        return view('contact_info/index',$data);

    }

    public function contact_form(){
        $data['get']      = HomeModels::get_contact_info();
        return view('contact_info/form',$data);

    }

    public function contact_add(Request $request){
        return HomeModels::add_contact_info($request);

    }

    public function get_member_address(Request $request){
        try {
            $username = $request->email;
            $data ='';
            if(is_numeric($username)){
                $data  = DB::table('t_member')->where('phone_number',$username)->first();
            }else{
                $data  = DB::table('t_member')->where('email',$username)->first();

            }
            $t_array = [];
            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $data;
            }
            return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }
    }
    public function profile_member(){
        return view('dashboard_member/index');

    }

    public function update_profile_member(Request $request){
        try {
            
           $data  = DB::table('t_member')
                    ->where('email',$request->email)
                    ->update([
                        'first_name'=>$request->first_name,
                        'last_name'=>$request->last_name,
                        'phone_number'=>$request->phone_number,
                        'provinsi_id'=>$request->province_id,
                        'kota_id'=>$request->city_id,
                        'address'=>$request->address,
                    ]);
            $t_array = [];
            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $data;
            }
            return $t_array;
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }
    }

    public function history_pesanan(Request $request){
        // $data['table'] = DB::table('t_transaction_detail as a')
        //         ->select('a.*','b.courier','b.courier','b.no_resi_pengiriman','b.amount_shipping','c.title as produk_nama','c.img as produk_img',DB::raw('DATE_FORMAT(b.created_at, "%d-%m-%Y") as date'),DB::raw('TIME(b.created_at) as time'))
        //         ->leftjoin('t_transaction_header as b','a.id_transaction','=','b.id')
        //         ->leftjoin('t_post_project as c','a.product_id','=','c.id')
		// 		->where('b.email','=',$request->email)
        //         ->get();
        $data['table'] = DB::table('t_transaction_header')->select('*',DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'),DB::raw('TIME(created_at) as time'))->where('email','=',$request->email)->get();
        return view('dashboard_member/pesanan',$data);    
    }


    // acara
    public function acara(){
        $data['table']      = HomeModels::get_acara();
        return view('acara/table',$data);
    }

    public function acara_form(){
        return view('acara/form');

    }
    public function acara_add(Request $request){
        return HomeModels::add_acara($request);
    }

    public function acara_edit(){
        return HomeModels::get_acara();

    }


    
}