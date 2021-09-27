<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $casts = [
		'name',
		'slug',
		'icon',
        'parent_id'  => 'integer',
        'position'   => 'integer',
		'description',
		'pictures'
		
    ];
}
