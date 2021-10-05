<?php

namespace App\Http\Controllers;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Barter;
use App\Model\BarterSell;
use App\Model\BarterBuy;
use App\Model\BarterMoneySell;
use App\Model\BarterMoneyBuy;
use App\Model\Category;
use App\Model\SellerAddress;
use App\Model\SellerBarterCart;
use App\Model\SellerBarterOrder;
use App\Model\SellerBarterOrderDeliveryStatus;
use App\Model\SellerBarterOrderDetail;
use App\Model\PremiumSettings;
use App\Model\Collection;
use App\User;
use App\Model\Seller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class BarterController extends Controller
{
    function listjoin() {
		$collection=Collection::get();
            $b = Barter::where('status','=',0)->orderBy('created_at', 'desc')->get();
			$bs=new BarterSell();
			$bb=new BarterBuy();
			$bms=new BarterMoneySell();
			$bmb=new BarterMoneyBuy();
			$category=Category::get();
			$seller = Seller::find(auth('seller')->id());
			$sa=SellerAddress::where(['seller_id' => 0])->where(['primary_address' => 1])->get();

        return view('web-views.barter.listjoin', compact('b','seller','category','bs','bb','bms','bmb','sa','collection'));
    }
}
