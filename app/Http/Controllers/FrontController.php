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

class FrontController extends Controller
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
        $dat['product'] =   DB::table('t_post_project')
                            ->select('*')
                            ->where('type','SEDEKAH')
                            ->get();

        $dat['acara'] =   DB::table('t_post_project')
                        ->select('*')
                        ->where('type','ACARA')
                        ->get();
        return view('front/index',$dat);  
        // $agent = $_SERVER['HTTP_USER_AGENT'];
        // if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$agent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($agent,0,4))){
        //     return view('front/mobile',$dat);   
        // }else{
        //     return view('front/index',$dat);   
        // }

        
            
    }

    public function donation(){
        return view('front/donation');        

    }

    public function checkout(){
        return view('front/checkout');        

    }

    public function contact(){
        return view('front/contact');        

    }

    public function shop(){
        return view('front/shop');   

    }

    public function product_detail(){
        return view('front/product_detail');

    }

    public function gallery(){
        return view('front/gallery');

    }
    public function sample(){
        return view('front/sample');
        
    }

    public function login_member(){
        return view('front/login');

    }

    public function register_member(){
        return view('front/signin');

    }

    public function success(){
        return view('front/success');

    }

    public function detail_models_front(Request $request){
        try {
            $id = $request->id;
          
    
            $header = DB::table('t_post_project')
                    ->select('*')
                    ->where('id',$id)
                    ->get(); 
            $gallery = DB::table('t_product_gallery')
                    ->select('*')
                    ->where('id_product',$id)
                    ->get();           
          
            $base_url = asset('public/images/gallery_product/');
            $base_url2 = asset('public/images/product/');
            $base_url3 = asset('public/images/product_eng/');
            foreach($header as $row){
                $head['harga'] = DB::table('t_product_harga')->where('product_id',$row->id)->pluck('harga')->first();
                $head['berat'] = DB::table('t_product_harga')->where('product_id',$row->id)->pluck('berat')->first();
                $head['id']  = $row->id;
                $head['img'] = $base_url2.'/'.$row->img;
                $head['img_eng'] = $base_url3.'/'.$row->location_eng;
                $head['title'] = $row->title;
                $head['desc'] = $row->desc;
                $head['desc_eng'] = $row->desc_eng;
                $count = $this->count_sumbangan($row->id);
                $head['total_sumbangan'] =  number_format(isset($count) ? $count : 0,2,',','.');
                $count2 = $this->count_donatur($row->id);
				$head['donatur'] = isset($count2) ? $count2 : 0;
            }          
            

            if ($header){
                $t_array['msg_type'] 	='success';
                $t_array['data'] 		= $head;
                $t_array['gallery'] 	= $gallery;

            }
            return $t_array;
        
    
        }
        catch(\Exception $e) {
            $t_array['msg_type'] 	='error';
            $t_array['msg'] 		=$e->getMessage();
            return $t_array;
       }


    }

    public function count_sumbangan($id_donasi){
		return DB::table('t_transaction_header')->select(DB::raw('sum(amount) as total'))->where('id_donasi',$id_donasi)->where('status','success')->pluck('total')->first();

    }

    public function count_donatur($id_donasi){
		return DB::table('t_transaction_header')->select(DB::raw('count(id) as total'))->where('id_donasi',$id_donasi)->where('status','success')->pluck('total')->first();

    }
}