<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Order extends Model
{
    protected $table = 'orders';
  
    protected $fillable = [
          'vnp_TxnRef',
          'vnp_OrderInfo',
          'vnp_PayDate',
          'vnp_ResponseCode',
          'vnp_Amount',
          'vnp_BankCode',
          'vnp_TransactionNo',
          'userId',
          'videoId'
      ];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'videoId');
    }
}
