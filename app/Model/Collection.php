<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $casts = [
        'parent_id'  => 'integer',
        'position'   => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function childes()
    {
        return $this->hasMany(Collection::class, 'parent_id');
    }
}
