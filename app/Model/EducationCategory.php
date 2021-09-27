<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class EducationCategory extends Model
{
	public $table = "education_category";
    protected $casts = [
        'id' => 'integer',
        'category',
		'description',
		'picture',

    ];

protected $guarded = [];
}
