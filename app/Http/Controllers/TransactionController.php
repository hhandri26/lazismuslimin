<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TransactionModels;
use App\Models\Veritrans;
use App\Models\HomeModels;
use DB;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Veritrans_Transaction;
class TransactionController extends Controller{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = true;
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
    public function create_payment()
    {
        \DB::transaction(function(){
            // Save donasi ke database
            $nomor_transaction = (int)$this->generate_number();
            $donation = TransactionModels::create([
                'first_name' => $this->request->name,
                'nomor_transaksi' => $nomor_transaction,
                'last_name' => '',
                'amount' => floatval($this->request->donation),
                'note' => $this->request->message,
                'email' => $this->request->email,
                'qty' => 1,
                'id_donasi' => $this->request->id_donasi
             
            ]);
            // save detail transaksi
            $detail = array();
           
              
              $send['id']=1;
              $send['price']=floatval($this->request->donation);
              $send['quantity']=1;
              $send['name']=$this->request->name;

              array_push($detail,$send);
              //TransactionModels::add_details($dat);
            
            //$shipping['id']=$donation->nomor_transaksi;
            //$shipping['price']= floatval($this->request->amount_shipping);
            //$shipping['quantity']=1;
            //$shipping['name']= $this->request->courier;
            //array_push($detail,$shipping);
 
            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $billing_address = array(
              'first_name'    => "Laziz Muslimin",
              'last_name'     => "",
              'address'       => "Jakarta",
              'city'          => "Jakarta ",
              'postal_code'   => "16810",
              'phone'         => "08211303100",
              'country_code'  => 'IDN'
              );
          // Populate customer's shipping address
          $shipping_address = array(
              'first_name'    => $this->request->name,
              'last_name'     => "",
              'address'       => "",
              'city'          => "",
              'postal_code'   => "",
              'phone'         => $this->request->no_hp,
              'country_code'  => 'IDN'
              );
            // $payload = [
            //     'transaction_details' => [
            //         'order_id'      => $nomor_transaction,
            //         'gross_amount'  => $this->request->donation,
            //     ],
            //     'customer_details' => [
            //         'first_name'    => $this->request->name,
            //         'email'         => $this->request->email,
            //         'phone'         => $this->request->no_hp,
            //         'billing_address' => "",
            //         'shipping_address'=> ""
            //     ],
            //     'item_details' => $detail
            // ];
            $payload = [
              'transaction_details' => [
                  'order_id'      => $donation->nomor_transaksi,
                  'gross_amount'  => $donation->amount,
              ],
              'customer_details' => [
                  'first_name'    => $donation->first_name,
                  'email'         => $donation->email,
                  'phone'         => $donation->phone,
                  'billing_address' => $billing_address,
                  'shipping_address'=> $shipping_address
              ],
              'item_details' => $detail
          ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();
            //$text='Mohon untuk segera melakukan pembayaran dengan nomor transaksi '.$donation->check_nomor_resi;
            //$text2='Transaksi baru dengan nomor transaksi '.$donation->check_nomor_resi;
            // send notif wa
            //$this->send_whatsapp($donation->phone,$text);
            // send notif wa sales
            //$this->send_whatsapp('082111303100',$text2);

            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });
 
        return response()->json($this->response);
    }
 
    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = TransactionModels::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $donation->setSuccess();
 
          } elseif($transaction == 'pending'){
 
            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $donation->setPending();
 
          } elseif ($transaction == 'deny') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $donation->setFailed();
 
          } elseif ($transaction == 'expire') {
 
            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $donation->setExpired();
 
          } elseif ($transaction == 'cancel') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $donation->setFailed();
 
          }
 
        });
 
        return;
    }

    public function new_order(){
      $data= DB::table('t_transaction_header as a')
            ->select('a.*',DB::raw('DATE_FORMAT(a.created_at, "%d-%m-%Y") as date'),DB::raw('TIME(a.created_at) as time'),'b.title')
            ->leftjoin('t_post_project as b','a.id_donasi','=','b.id')
            ->orderby('created_at','DESC')
            ->get();
            $dt = array();
           
      foreach($data as $rowo){
     
        $row['id']=$rowo->id;
        
        $row['first_name']=$rowo->first_name;
        $row['last_name']=$rowo->last_name;
        $row['amount']=$rowo->amount;
        $row['address']=$rowo->address;
        $row['note']=$rowo->note;
        $row['email']=$rowo->email;
        $row['qty']=$rowo->qty;
        $row['phone']=$rowo->phone;
       
        $row['status']=$rowo->status;
        $row['snap_token']=$rowo->snap_token;
        $row['created_at']=$rowo->created_at;
        $row['updated_at']=$rowo->updated_at;
      
        $row['nomor_transaksi']=$rowo->nomor_transaksi;
        $row['donasi']=$rowo->title;
        $row['date']=$rowo->date;
        $row['time']=$rowo->time;
        // $row['status_payment']=$this->check_status_pembayaran($rowo->nomor_transaksi);
        // $row['status_order']=$this->check_nomor_resi($rowo->no_resi_pengiriman,$rowo->courier);
        array_push($dt,$row);
      }
      //var_dump($dt);die();
      $kk['table'] = $dt;
        return view('order/index',$kk);

    }

    public function order_form(Request $request){
      // $kk['table'] = $dt;
      // return view('order/index',$kk);
      $data['get']      = HomeModels::get_order_form();
      return view('order/form',$data);


    }

    public function update_nomor_resi(){
      try {
        $id 		= request()->id;
        $status = request()->status;
       //var_dump($status);die();
          $update = DB::table('t_transaction_header')
                ->where('id',$id)
                ->update([
                      'status' =>$status,
                  ]);
          $confirm1	=1;
        
        if ($confirm1==1){
          //$text ='Pesanan anda sudah di kirim dengan nomor resi '.$nomor_resi;
          //$this->send_whatsapp($nomor_hp,$text);

          var_dump($update);die();
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

    public function history_pesanan(Request $request){
      
      $data= DB::table('t_transaction_header')
            ->select('*',DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'),DB::raw('TIME(created_at) as time'))
            ->where('member_id',$request->email)
            ->orderby('created_at','DESC')
            ->get();
            $dt = array();
           
      foreach($data as $rowo){
        $row['member_id']=$rowo->member_id;
        $row['id']=$rowo->id;
        
        $row['first_name']=$rowo->first_name;
        $row['last_name']=$rowo->last_name;
        $row['amount']=$rowo->amount;
        $row['address']=$rowo->address;
        $row['note']=$rowo->note;
        $row['email']=$rowo->email;
        $row['qty']=$rowo->qty;
        $row['phone']=$rowo->phone;
        $row['amount_shipping']=$rowo->amount_shipping;
        $row['courier']=$rowo->courier;
        $row['status']=$rowo->status;
        $row['snap_token']=$rowo->snap_token;
        $row['created_at']=$rowo->created_at;
        $row['updated_at']=$rowo->updated_at;
        $row['no_resi_pengiriman']=$rowo->no_resi_pengiriman;
        $row['nomor_transaksi']=$rowo->nomor_transaksi;
        $row['date']=$rowo->date;
        $row['time']=$rowo->time;
        $row['status_payment']=$this->check_status_pembayaran($rowo->nomor_transaksi);
        $row['status_order']=$this->check_nomor_resi($rowo->no_resi_pengiriman,$rowo->courier);
        array_push($dt,$row);
      }
      //var_dump($dt);die();
      $kk['table'] = $dt;
      return view('dashboard_member/pesanan',$kk);    
  }

    public function review_detail_transaction(Request $request){
      $id_transaction = $request->id;
      $data = DB::table('t_transaction_detail as a')->select('a.*','b.title as product_name')->leftjoin('t_post_project as b','a.product_id','=','b.id')->where('id_transaction',$id_transaction)->get();
      return $data;
    }

    public function check_nomor_resi_status(Request $request){
      $courier = $request->courier;
      $nomor_resi = $request->nomor_resi;
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "waybill=".$nomor_resi."&courier=".$courier."",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key:1978500ddbac5d0319ef61266e877d8b"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
      

    }

    public function check_nomor_resi($nomor_resi,$kurir){
      if($nomor_resi!==null){
        
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "waybill=".$nomor_resi."&courier=".$kurir,
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key:1978500ddbac5d0319ef61266e877d8b"
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            return "cURL Error #:" . $err;
          } else {
                  //return $response['rajaongkir'];
                 // return $response['rajaongkir'];
                 // echo json_encode($data['rajaongkir']['result']['summary']);
                $data = json_decode($response, true);
                //var_dump($data);die();
                return json_encode($data['rajaongkir']['status']['description']);

               
          }

      }else{
        return 'Pesanan Sedang Di Siapkan !';
      }
      


    }

    public function check_status_pembayaran($orderId){
     
    
    //   $vt = new Veritrans_Transaction;
    //   $status = $vt->status($orderId);
    //   if($status!=='Gagal'){
    //     //var_dump($status);die();
    //     return $status->transaction_status;
    //   }else{
    //     return 'Cencel';
    //   }
    //  //return $status->transaction_status;
 
     

    }

    public function send_whatsapp($phone,$text){
     
          $curl = curl_init();
          $token = "9k3tdEHMUGmxXkozr9FoRkFqARlQHJaZ1ZajDaitAFdgzfqH2zMlmQXD7J0OUEGU";
          $data = [
              'phone' => $phone,
              'message' => $text,
          ];

          curl_setopt($curl, CURLOPT_HTTPHEADER,
              array(
                  "Authorization: $token",
              )
          );
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
          curl_setopt($curl, CURLOPT_URL, "https://console.wablas.com/api/send-message");
          curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
          $result = curl_exec($curl);
          curl_close($curl);

         

    }

    public function generate_number(){
      mt_srand((double)microtime()*10000);
      $charid = md5(uniqid(rand(), true));
      $c = unpack("C*",$charid);
      $c = implode("",$c);

      return substr($c,0,10);
    }

    public function create_transaction_custom(Request $request){
      try {
         // Save donasi ke database
         $nomor_transaction = (int)$this->generate_number();
         $digits = 3;
          $dg =  rand(pow(10, $digits-1), pow(10, $digits)-1);
          $total = floatval($this->request->donation)+$dg;
          $metode =  $this->request->metode_pembayaran;

         // var_dump($total);die();
         
         $donation = TransactionModels::create([
             'first_name' => $this->request->name,
             'nomor_transaksi' => $nomor_transaction,
             'last_name' => '',
             'amount' => $total,
             'note' => $this->request->message,
             'email' => $this->request->email,
             'qty' => 1,
             'id_donasi' => $this->request->id_donasi
          
         ]);
      

        if ($donation){
            $t_array['msg_type'] 	='success';
            $t_array['total'] 	  =$total;
            $t_array['dg'] 	      =$dg;
            $t_array['no_transaksi'] =$nomor_transaction;
            $t_array['amount'] =$this->request->donation;
            $t_array['metode'] =$metode;
            
        }
        return $t_array;
    

    }
    catch(\Exception $e) {
        $t_array['msg_type'] 	='error';
        $t_array['msg'] 		=$e->getMessage();
        return $t_array;
   }

    }

    public function invoice(){
      return view('front/rekening');

    }
 

}