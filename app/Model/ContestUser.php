<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class ContestUser extends Model
{
	public $table = "contest_user";
    protected $casts = [
        'id' => 'integer',
        'contest_id' => 'integer',
        'user_id' => 'integer',
        'seller_id' => 'integer',
        'answer' => 'text'
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class)->where('contest_id');
    }

}
