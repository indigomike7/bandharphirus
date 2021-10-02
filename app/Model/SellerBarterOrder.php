<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerBarterOrder extends Model
{
	public $table = "seller_barter_order";
	protected $casts = [
        'id' => 'integer',
        'seller_id_sell' => 'integer',
        'seller_id_demand' => 'integer',
		'status'=>'text',
		'seller_sell_amount',
		'seller_demand_amount',

    ];
protected $guarded = [];

}
