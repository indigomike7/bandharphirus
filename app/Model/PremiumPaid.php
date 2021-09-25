<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class PremiumPaid extends Model
{
	public $table = "premium_paid";
    protected $casts = [
        'id' => 'integer',
        'user_id'=>'integer' ,
        'days' ,
        'amount',

    ];

}
