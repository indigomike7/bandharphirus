<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarterSell extends Model
{
	public $table = "barter_sell";
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
