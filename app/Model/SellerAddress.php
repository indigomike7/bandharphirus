<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
	public $table = "seller_address";
	protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'address' => 'text',
		'zip_code'=>'text',
		'primary_address'=>'integer'
    ];
protected $guarded = [];

}
