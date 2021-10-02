<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerBarterCart extends Model
{
	public $table = "seller_barter_cart";
	protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'barter_id' => 'integer',
    ];
protected $guarded = [];

}
