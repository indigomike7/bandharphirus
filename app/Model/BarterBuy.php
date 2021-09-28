<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarterBuy extends Model
{
	public $table = "barter_buy";
	protected $casts = [
        'id' => 'integer',
        'barter_id' => 'integer',
		'product_name',
		'picture',
		'quantity',
		'description'
    ];
protected $guarded = [];

}
