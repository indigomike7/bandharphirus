<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	public $table = "education";
    protected $casts = [
        'id' => 'integer',
        'category'=>'integer',
        'title',
		'description',
		'picture',

    ];

protected $guarded = [];
}
