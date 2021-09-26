<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class ContestCategory extends Model
{
	public $table = "contest_category";
    protected $casts = [
        'id' => 'integer',
        'category' ,
        'description' ,

    ];

}
