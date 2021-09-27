<?php

namespace App\Http\Controllers\Web;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\EducationCategory;
use App\Model\Education;
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


class EducationCategoryController extends Controller
{
    function educationcategory() {
		$collection=Collection::get();
		$ec = EducationCategory::get();
        return view('web-views.educationcategory', compact('ec','collection'));
    }

    function educationcategoryid(Request $request) {
		$collection=Collection::get();
		$ec = EducationCategory::find($request->id);
		$e=Education::where('category','=',$ec->id)->get();
        return view('web-views.educationcategoryid', compact('ec','collection','e'));
    }
    function educationid(Request $request) {
		$collection=Collection::get();
		$e=Education::where('id','=',$request->id)->first();
		$ec=EducationCategory::where('id','=',$e->category)->first();
        return view('web-views.educationid', compact('ec','collection','e'));
    }
}
