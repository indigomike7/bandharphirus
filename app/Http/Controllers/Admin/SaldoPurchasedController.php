<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\SaldoPurchased;
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


class SaldoPurchasedController extends Controller
{
    function settings() {
            $sp = SaldoPurchased::find(1);

        return view('admin-views.saldo.settings', compact('sp'));
    }
    function settingsupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'saldo1' => 'required',
            'saldo2' => 'required',
            'saldo3' => 'required',
            'saldo4' => 'required',
        ], [
            'saldo1.required' => 'Saldo 1 is required!',
            'saldo2.required' => 'Saldo 2 is required!',
            'saldo3.required' => 'Saldo 3 is required!',
            'saldo4.required' => 'Saldo 4 is required!',
        ]);

        $sp = SaldoPurchased::find(1);
        $sp->saldo1 = $request->saldo1;
        $sp->saldo2 = $request->saldo2;
        $sp->saldo3 = $request->saldo3;
        $sp->saldo4 = $request->saldo4;
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $sp->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }

}
