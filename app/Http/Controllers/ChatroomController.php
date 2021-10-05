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


class ChatroomController extends Controller
{
    function listjoin() {
		$collection=Collection::get();

        return view('web-views.chatroom.listjoin', compact('collection'));
    }
}
