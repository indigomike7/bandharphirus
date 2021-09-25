<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class SaldoPurchased extends Model
{
	public $table = "saldo_purchased";
    protected $casts = [
        'id' => 'integer',
        'saldo1' ,
        'saldo2' ,
        'saldo3',
        'saldo4'

    ];

}
