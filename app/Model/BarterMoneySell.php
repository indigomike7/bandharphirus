<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarterMoneySell extends Model
{
	public $table = "barter_money_sell";
	protected $casts = [
        'id' => 'integer',
        'barter_id' => 'integer',
		'amount',
    ];
protected $guarded = [];

}
