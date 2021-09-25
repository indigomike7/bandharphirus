<?php

namespace App\Http\Controllers\Seller;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\PremiumSettings;
use App\Model\PremiumPaid;
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


class PremiumController extends Controller
{
    function update() {
            $ps = PremiumSettings::find(1);
			$seller = Seller::find(auth('seller')->id());
		$config=\App\CPU\Helpers::get_business_settings('tripay');
		$apiKey = $config["tripay_api"];
		//echo $apiKey;
/*		$payload = [
		  'code'	=> 'BRIVA'
		];
*/
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_FRESH_CONNECT     => true,
		  CURLOPT_URL               => "https://tripay.co.id/api-sandbox/merchant/payment-channel",
		  CURLOPT_RETURNTRANSFER    => true,
		  CURLOPT_HEADER            => false,
		  CURLOPT_HTTPHEADER        => array(
			"Authorization: Bearer ".$apiKey
		  ),
		  CURLOPT_FAILONERROR       => false
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		//echo !empty($err) ? $err : $response;
            //return view('web-views.checkout-payment',['response'=>$response]);

        return view('seller-views.premium.update', compact('ps','seller'),['response'=>$response]);
    }
    function success(Request $request) {
            $ps = PremiumSettings::find(1);
			$seller = Seller::find(auth('seller')->id());
			$amount=$request->amount;
			$paid_premium_days=$request->days;

			$pp = new PremiumPaid();
			$pp->seller_id = $seller->id;
			$pp->days=$paid_premium_days;
			$pp->amount= $amount;
			$pp->save();
			if($seller->premium_until!== "0000-00-00 00:00:00")
				$date=date_create($seller->premium_until);
			else
				$date=date_create(date("Y-m-d H:i:s"));
			date_add($date,date_interval_create_from_date_string($paid_premium_days." days"));
			$seller->premium_until=date_format($date, 'Y-m-d H:i:s');
			$seller->save();

			return redirect('/seller/premium/premium');


    }

    function premium(Request $request) {
            $ps = PremiumSettings::find(1);
			$seller = Seller::find(auth('seller')->id());
			return view('seller-views.premium.premium',compact('seller'));


    }

}
