<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerBarterOrderDeliveryStatus extends Model
{
	public $table = "seller_barter_order_delivery_status";
	protected $casts = [
        'id' => 'integer',
        'seller_sell_id' => 'integer',
        'seller_demand_id' => 'integer',
		'status'=>'text',

    ];
protected $guarded = [];

}
