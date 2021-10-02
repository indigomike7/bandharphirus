<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerBarterOrderDetail extends Model
{
	public $table = "seller_barter_order_detail";
	protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'barter_id' => 'integer',

    ];
protected $guarded = [];

}
