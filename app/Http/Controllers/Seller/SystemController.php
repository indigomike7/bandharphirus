<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\WithdrawRequest;
use Illuminate\Http\Request;
use App\User;
use App\Model\Seller;

class SystemController extends Controller
{
    public function dashboard(){
			$seller = Seller::find(auth('seller')->id());
        $withdraw_req=WithdrawRequest::where('seller_id',auth('seller')->id())->latest()->paginate(10);
        return view('seller-views.system.dashboard',compact('withdraw_req','seller'));
    }
}
