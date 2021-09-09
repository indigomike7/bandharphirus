<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
	public $table = "contest";
	protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'name' => 'text',
        'description' => 'tet',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_date' => 'datetime',
        'result' => 'text',
		'picture' =>'text'
    ];

}
