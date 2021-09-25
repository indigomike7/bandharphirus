<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\PremiumSettings;
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


class Premium2Controller extends Controller
{
    function settings() {
            $ps = PremiumSettings::find(1);

        return view('admin-views.premium.settings', compact('ps'));
    }
    function settingsupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'cost_30_days' => 'required',
            'cost_90_days' => 'required',
            'cost_180_days' => 'required',
            'cost_365_days' => 'required',
        ], [
            'cost_30_days.required' => 'Cost 30 Days is required!',
            'cost_90_days.required' => 'Cost 90 Days  is required!',
            'cost_180_days.required' => 'Cost 180 Days  is required!',
            'cost_365_days.required' => 'Cost 365 Days  is required!',
        ]);

        $ps = PremiumSettings::find(1);
        $ps->cost_30_days = $request->cost_30_days;
        $ps->cost_90_days = $request->cost_90_days;
        $ps->cost_180_days = $request->cost_180_days;
        $ps->cost_365_days = $request->cost_365_days;
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $ps->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }

}
