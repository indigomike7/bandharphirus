<?php

namespace App\Http\Controllers\Seller;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\SaldoPurchased;
use App\Model\Saldo;
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


class SaldoController extends Controller
{
    function update() {
            $sp = SaldoPurchased::find(1);
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

        return view('seller-views.saldo.update', compact('sp','seller'),['response'=>$response]);
    }
    function success(Request $request) {
			$seller = Seller::find(auth('seller')->id());
			$amount=$request->amount;

			$s = new Saldo();
			$s->action="Buy";
			$s->seller_id = $seller->id;
			$s->amount= $amount;
			$s->save();
			$seller->saldo=$seller->saldo+$amount;
			$seller->save();

			return redirect('/seller/saldo/saldo');


    }

    function saldo(Request $request) {
			$seller = Seller::find(auth('seller')->id());
			$s=new Saldo();
			return view('seller-views.saldo.saldo',compact('seller','s'));


    }

}
