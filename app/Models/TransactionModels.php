<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use DB;
 
class TransactionModels extends Model
{
    /**
     * Fillable attribute.
     *
     * @var array
     */
    protected $table = 't_transaction_header';
    protected $fillable = [
        'first_name',
        'last_name',
        'amount',
        'address',
        'note',
        'email',
        'qty',
        'phone',
        'status',
        'snap_token',
        'nomor_transaksi',      
        'id_donasi'
    ];
 
    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
 
    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
 
    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }
 
    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }

    public static function add_details($dat){
        DB::table('t_transaction_detail')->insert($dat);
    }
}