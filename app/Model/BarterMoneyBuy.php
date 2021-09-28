<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarterMoneyBuy extends Model
{
	public $table = "barter_money_buy";
	protected $casts = [
        'id' => 'integer',
        'barter_id' => 'integer',
		'amount',
    ];
protected $guarded = [];

}
