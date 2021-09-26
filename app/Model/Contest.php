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
        'description' => 'text',
		'fund','decimal',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'start_date_1' => 'integer',
        'end_date_1' => 'integer',
        'start_date_2' => 'integer',
        'end_date_2' => 'integer',
        'start_date_3' => 'integer',
        'end_date_3' => 'integer',
        'created_date' => 'datetime',
        'result' => 'text',
		'picture' =>'text',
		'contestcat'=>'integer'
    ];

}
