<?php

namespace App\Http\Controllers;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Contest;
use App\Model\ContestUser;
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


class Contest3Controller extends Controller
{
	public function listjoin()
    {
		$collection=Collection::get();
            $contest1 = Contest::where("start_date","<=",date("Y-m-d H:i:s"))->where("end_date",">=",date("Y-m-d H:i:s"))->where("start_date","<>",null)->where("end_date","<>",null);
			$contest2 = Contest::where("start_date_1","<=",date("d"))->where("end_date_1",">=",date("d"))->where("start_date_1","<>",null)->where("end_date_1","<>",null);
			$contest3 = Contest::where("start_date_2","<=",date("d"))->where("end_date_2",">=",date("d"))->where("start_date_2","<>",null)->where("end_date_2","<>",null);
			$contest = Contest::where("start_date_3","<=",date("d"))->where("end_date_3",">=",date("d"))->where("start_date_3","<>",null)->where("end_date_3","<>",null)->union($contest1)->union($contest2)->union($contest3)->orderBy('created_at', 'desc')->get();
			$contestuser = new ContestUser();

        return view('web-views.contest.listjoin', compact('contest','contestuser','collection'));
    }
}
