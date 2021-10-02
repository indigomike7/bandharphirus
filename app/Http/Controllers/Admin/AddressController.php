<?php

namespace App\Http\Controllers\Admin;

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


class AddressController extends Controller
{
    function list() 
	{
		$a = SellerAddress::where(['seller_id' => 0])->orderBy('created_at', 'desc')->get();
		$sa=SellerAddress::where(['seller_id' => 0])->where(['primary_address' => 1])->get();

		return view('admin-views.address.list', compact('a','sa'));
    }
    public function edit($id)
    {
        $a= SellerAddress::find($id);
        return view('admin-views.address.edit', compact('a'));

    }

    function add() {
        return view('admin-views.address.add');
    }
    public function defaultaddress(Request $request)
    {
		$a = SellerAddress::find($request['id']);
        SellerAddress::where('seller_id', $a->seller_id)->update([
            'primary_address' => 0,
        ]);
        SellerAddress::where('id', $request['id'])->update([
            'primary_address' => 1,
        ]);
        Toastr::success('Primary Address set successfully!');
        return back();
    }
    public function delete($id)
    {
        $a = SellerAddress::find($id);
        $a->delete();
        Toastr::success('Address removed successfully!');
        return back();
    }
    function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'zip_code' => 'required',
        ], [
            'address.required' => 'Address is required!',
            'zip_code.required' => 'Zip Code is required!',
        ]);

        $a = SellerAddress::find($request->id);
        $a->address = $request->address;
        $a->zip_code = $request->zip_code;
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $a->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function addnew(Request $request) {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'zip_code' => 'required',
        ], [
            'address.required' => 'Address is required!',
            'zip_code.required' => 'Zip Code  is required!',
        ]);

        $a = new SellerAddress();
        $a->address = $request->address;
        $a->zip_code = $request->zip_code;
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $a->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
}
