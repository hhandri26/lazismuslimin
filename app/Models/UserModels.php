<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModels extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'id', 'name', 'costumer_id', 'doc_no', 'doc_from',
    //     'barcode_document', 'date_created'
    // ];
    public $timestamps = false;
}
