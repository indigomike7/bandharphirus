<?php

namespace App\Model;

use App\Model\Contest;
use Illuminate\Database\Eloquent\Model;

class PremiumSettings extends Model
{
	public $table = "premium_settings";
    protected $casts = [
        'id' => 'integer',
        'cost_30_days' ,
        'cost_90_days' ,
        'cost_180_days',
        'cost_365_days'

    ];

}
