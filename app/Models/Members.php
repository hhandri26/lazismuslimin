<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use DB;


class Members extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 't_member';
    protected $fillable = [
        'email', 'password','first_name','last_name','phone_number','provinsi_id','kota_id','address'
    ];

    public static function get_sample_request(){
        $data = DB::table('t_request as a')
                ->select('a.*','b.first_name as member_name','c.title as product_name')
                ->leftjoin('t_member as b','a.id_member','=','b.id')
                ->leftjoin('t_post_project as c','a.id_product','=','c.id')
                ->get();
        return $data;
    }

  
}
