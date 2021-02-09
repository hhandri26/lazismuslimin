<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Groupmenu;
use App\Models\Submenu;
use App\Models\HomeModels;
use Alert;
use DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       
        return view('home');              
    }

   public function check_login()
   {
        if (Auth::check()) {
            return $this->index();
        }else{
            return view('login/form_login');
        }
   }
    public function slideshow(Request $request){
        try {
            $base_url = asset('public/images/banner/');
    
            $data = DB::table('t_slideshow')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }
       
    }

    public function product(Request $request){
        try {
            $base_url = asset('public/images/product/');
            $base_url2 = asset('public/images/product_eng/');
    
            $data = DB::table('t_post_project')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['img_eng'] = $base_url2.'/'.$row->location_eng;
                $dat['title'] = $row->title;
                $dat['desc'] = $row->desc;
                $dat['desc_eng'] = $row->desc_eng;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function why_us(Request $request){
        try {
            $base_url = asset('public/images/why_us/');
    
            $data = DB::table('t_why_us')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['title'] = $row->title;
                $dat['title_desc'] = $row->title_desc;
                $dat['title_number'] = $row->title_number;
                $dat['desc'] = $row->desc;
                $dat['desc_eng'] = $row->desc_eng;
                $dat['bg'] = $row->bg;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function binefit(Request $request){
        try {
            $base_url = asset('public/images/binefit/');
    
            $data = DB::table('t_benefit')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['title'] = $row->title;
                $dat['desc'] = $row->desc;
                $dat['desc_eng'] = $row->desc_eng;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function project(Request $request){
        try {
            $base_url = asset('public/images/project/');
    
            $data = DB::table('t_past_project')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['title'] = $row->title;
                $dat['desc'] = $row->desc;
                $dat['desc_eng'] = $row->desc_eng;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function gallery(Request $request){
        try {
            $base_url = asset('public/images/gallery/');
    
            $data = DB::table('t_gallery')
                    ->select('*')
                    ->get();
            $img = array();
            foreach($data as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['title'] = $row->title;
                $dat['desc'] = $row->desc;
                $dat['desc_eng'] = $row->desc_eng;
                array_push($img,$dat);

            }

            if ($data){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }

    public function contact_info(Request $request){
        try {
          
    
            $data = DB::table('t_contact_info')
                    ->select('*')
                    ->get();
            

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

    public function detail_product(Request $request){
        
        try {
            $id = $request->id;
          
    
            $header = DB::table('t_post_project')
                    ->select('*')
                    ->where('id',$id)
                    ->get();
            
            $detail = DB::table('t_product_gallery')
                    ->select('*')
                    ->where('id_product',$id)
                    ->get();
            $base_url = asset('public/images/gallery_product/');
            $base_url2 = asset('public/images/product/');
            $base_url3 = asset('public/images/product_eng/');
            $img = array();
            foreach($header as $row){
                $head['harga'] = DB::table('t_product_harga')->where('product_id',$row->id)->pluck('harga')->first();
                $head['berat'] = DB::table('t_product_harga')->where('product_id',$row->id)->pluck('berat')->first();
                $head['id']  = $row->id;
                $head['img'] = $base_url2.'/'.$row->img;
                $head['img_eng'] = $base_url3.'/'.$row->location_eng;
                $head['title'] = $row->title;
                $head['desc'] = $row->desc;
                $head['desc_eng'] = $row->desc_eng;
            }
            foreach($detail as $row){
                $dat['id']  = $row->id;
                $dat['img'] = $base_url.'/'.$row->img;
                $dat['title'] = $row->title;
                array_push($img,$dat);

            }
            

            if ($header){
                $t_array['msg_type'] 	='success';
                $t_array['header'] 		= $head;
                $t_array['detail'] 		= $img;
            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

        

    }

    public function get_size_product(Request $request){
        try {
            $id = $request->id;
          
    
            $data = DB::table('t_product_harga')
                    ->select('*')
                    ->where('product_id',$id)
                    ->get();
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

    public function get_price_product(Request $request){
        try {
            $id     = $request->id;
            $qty    = $request->qty;
          
    
            $data = DB::table('t_product_harga')
                    ->select('*')
                    ->where('id',$id)
                    ->first();
            if ($data){
                $harga = 0;
                if($data->qty_grosir!==''){
                    if($qty >= $data->qty_grosir){
                        $harga = $data->harga_grosir;

                    }else{
                        $harga = $data->harga;
                    }
                }else{
                    $harga = $data->harga;
                }

                $dat['harga'] = $harga;
                $dat['berat'] = $data->berat;
                $dat['panjang']= $data->panjang;
                $dat['lebar']= $data->lebar;
                $dat['tinggi']= $data->tinggi;
                
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $dat;
            }
            return $t_array;
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }

    }
    public function _api_ongkir($data)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
            //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",		  
            CURLOPT_HTTPHEADER => array(
                /* masukan api key disini*/
                "key: 1978500ddbac5d0319ef61266e877d8b",
                'Content-Type: application/json',
                'Accept: application/json',
            ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
            return  $err;
            } else {
            return $response;
            }
        }
    public function provinsi()
    {
        $provinsi = $this->_api_ongkir('province');
        $data = json_decode($provinsi, true);
        echo json_encode($data['rajaongkir']['results']);
    }
    public function kota(Request $request)
        {
            $provinsi = $request->provinsi_id;
            if(!empty($provinsi))
            {
                if(is_numeric($provinsi))
                {
                    $kota = $this->_api_ongkir('city?province='.$provinsi);	
                    $data = json_decode($kota, true);
                    echo json_encode($data['rajaongkir']['results']);		  					 
                }
                else
                {
                    show_404();
                }
            }
            else
            {
                show_404();
            }
        }
        public function kecamatan(Request $request)
        {
            $city = $request->city_id;
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=".$city,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "key: 1978500ddbac5d0319ef61266e877d8b"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
                $data = json_decode($response, true);
                echo json_encode($data['rajaongkir']['results']);
            }
        }
        public function tarif(Request $request)
        {
            $berat =$request->berat;
            $origin =$request->origin;
            $des=$request->des;
            $cour=$request->id_kurir;
            
            $tarif = $this->_api_ongkir_post($origin,$des,$berat,$cour);		
            $data = json_decode($tarif, true);
            echo json_encode($data['rajaongkir']['results']);		
        }

        public function _api_ongkir_post($origin,$des,$berat,$cour)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$origin."&originType=subdistrict&destination=".$des."&destinationType=subdistrict&weight=".$berat."&courier=".$cour,	  
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                /* masukan api key disini*/
                "key:1978500ddbac5d0319ef61266e877d8b"
                ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                return $err;
                } else {
                return $response;
                }
        }

  

  

   
}
