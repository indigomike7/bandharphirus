<?php

namespace App\Http\Controllers;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Contest;
use App\Model\ContestUser;
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
/*    function list() {
            $contest = Contest::where(['seller_id' => 0])->orderBy('created_at', 'desc')->get();

        return view('admin-views.contest.list', compact('contest'));
    }
    public function edit($id)
    {
        $contest = Contest::find($id);
        return view('admin-views.contest.edit', compact('contest'));

    }

    public function listmanage($id)
    {
        $contest = Contest::find($id);
        $user = new User();
        $seller = new Seller();
		$contestuser = new ContestUser();
        return view('admin-views.contest.view', compact('contest','user','seller','contestuser'));

    }
 
    function add() {
//		die("add");
        return view('admin-views.contest.add');
    }

    public function remove_image(Request $request)
    {
        ImageManager::delete('contest/' . $request['image']);
        $contest = Contest::find($request['id']);
        $array = [];
        if (count(json_decode($contest['picture'])) < 2) {
            Toastr::warning('You cannot delete all images!');
            return back();
        }
        foreach (json_decode($contest['picture']) as $image) {
            if ($image != $request['name']) {
                array_push($array, $image);
            }
        }
        Product::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Product image removed successfully!');
        return back();
    }
	*/
    public function remove_image_user(Request $request)
    {
        ImageManager::delete('contest/' . $request['image']);
        $contest = ContestUser::where('contest_id', $request['id'])->where('user_id', auth('customer')->id())->first();

        $array = [];
        foreach (json_decode($contest['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        $contest->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Product image removed successfully!');
        return back();
    }
	public function listjoin()
    {
//		die(auth('customer')->id());
		if(auth('customer')->id()== null)
		{
			return redirect()->route('customer.auth.login');
		}
            $contest1 = Contest::where("start_date","<=",date("Y-m-d H:i:s"))->where("end_date",">=",date("Y-m-d H:i:s"))->where("start_date","<>",null)->where("end_date","<>",null);
			$contest2 = Contest::where("start_date_1","<=",date("d"))->where("end_date_1",">=",date("d"))->where("start_date_1","<>",null)->where("end_date_1","<>",null);
			$contest3 = Contest::where("start_date_2","<=",date("d"))->where("end_date_2",">=",date("d"))->where("start_date_2","<>",null)->where("end_date_2","<>",null);
			$contest = Contest::where("start_date_3","<=",date("d"))->where("end_date_3",">=",date("d"))->where("start_date_3","<>",null)->where("end_date_3","<>",null)->union($contest1)->union($contest2)->union($contest3)->orderBy('created_at', 'desc')->get();
			$contestuser = new ContestUser();

        return view('web-views.contest.listjoin', compact('contest','contestuser'));
    }/*
    public function delete($id)
    {
        $contest = Contest::find($id);
		if($contest['images']!=null){
        foreach (json_decode($contest['images'], true) as $image) {
            ImageManager::delete('contest/' . $image);
        }}
        $contest->delete();
        Toastr::success('Contest removed successfully!');
        return back();
    }
	function displayImage($filename)
	{
		$path = storage_public('contest/' . $filename);
		if (!File::exists($path)) {

			abort(404);
		}
		$file = File::get($path);
		$type = File::mimeType($path);
		$response = Response::make($file, 200);
		$response->header("Content-Type", $type);
		return $response;

	}
    function addnew2(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'start_date.required' => 'Start Date is required!',
            'end_date.required' => 'End Date is required!',
        ]);

        $contest = new Contest();
        $contest->seller_id = 0;
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->start_date = $request->start_date;
        $contest->end_date = $request->end_date;
//        $contest->created_date = date("Y-m-d H:i:s");

 
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('contest/', 'png', $img);
            }
            $contest->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contest->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
*/
    function join(Request $request) {
		if(!auth('customer')->id())
		{
			return redirect()->route('customer.auth.login');
		}
        $validator = Validator::make($request->all(), [
            'answer-'.$request->id => 'required'
        ], [
            'answer-'.$request->id.'.required' => 'Answer is required!'
        ]);

        $contestuser = ContestUser::where("user_id","=",auth('customer')->id())->where("contest_id","=",$request->id)->first();
		if(!empty($contestuser))
		{
			$contestuser->answer = $request['answer-'.$request->id];
		}
		else
		{
			$contestuser=new ContestUser();
			$contestuser->user_id = auth('customer')->id();
			$contestuser->contest_id = $request->id;
			$contestuser->answer = $request['answer-'.$request->id];
		}
 

 		$product_images=json_decode($contestuser->picture);
        if ($request->file('images-'.$request->id)) {
            foreach ($request->file('images-'.$request->id) as $img) {
                $product_images[] = ImageManager::upload('contest/', 'png', $img);
            }
            $contestuser->picture = json_encode($product_images);
        }
 

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contestuser->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }/*
    function updatemanage(Request $request) {
        $validator = Validator::make($request->all(), [
            'result' => 'required',
            'id' => 'required'
        ], [
            'result.required' => 'Answer is required!',
            'id.required' => 'ID is required! You got error in your posting. Please refresh!!'
        ]);

        $contest = Contest::where("seller_id","=",0)->where("id","=",$request->id)->first();
		if(!empty($contest))
		{
			$contest->result = $request->result;
		}
 

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contest->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ], [
            'name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'start_date.required' => 'Start Date is required!',
            'end_date.required' => 'End Date is required!',
        ]);

        $contest = Contest::find($request->id);
        $contest->seller_id = 0;
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->start_date = $request->start_date;
        $contest->end_date = $request->end_date;
//        $contest->created_date = date("Y-m-d H:i:s");

 
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('contest/', 'png', $img);
            }
            $contest->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contest->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }*/
}
