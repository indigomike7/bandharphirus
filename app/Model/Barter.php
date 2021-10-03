<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barter extends Model
{
	public $table = "barter";
	protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'category' => 'integer',
		'status'=>'integer'
    ];
protected $guarded = [];

}
