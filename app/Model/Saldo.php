<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
	public $table = "saldo";
    protected $casts = [
        'id' => 'integer',
        'seller_id'=>'integer' ,
        'action' ,
        'amount'

    ];

}
