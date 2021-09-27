<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Contest;
use App\Model\ContestUser;
use App\Model\ContestCategory;
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


class Contest2Controller extends Controller
{
    function category() {
            $contestcat = ContestCategory::get();

        return view('admin-views.contest.category', compact('contestcat'));
    }
    function list() {
            $contest = Contest::where(['seller_id' => 0])->orderBy('created_at', 'desc')->get();

        return view('admin-views.contest.list', compact('contest'));
    }
    public function edit($id)
    {
            $contestcat = ContestCategory::get();
        $contest = Contest::find($id);
        return view('admin-views.contest.edit', compact('contest','contestcat'));

    }
    public function categoryedit($id)
    {
        $contest = ContestCategory::find($id);
        return view('admin-views.contest.categoryedit', compact('contest'));

    }

    public function listmanage($id)
    {
            $contestcat = ContestCategory::get();
        $contest = Contest::find($id);
        $user = new User();
        $seller = new Seller();
		$contestuser = new ContestUser();
        return view('admin-views.contest.view', compact('contest','user','seller','contestuser','contestcat`'));

    }
 
    function add() {
            $contestcat = ContestCategory::get();
//			var_dump($contestcat);
        return view('admin-views.contest.add',compact('contestcat'));
    }

    function categoryadd() {
//		die("add");
        return view('admin-views.contest.categoryadd');
    }
    public function remove_image(Request $request)
    {
        ImageManager::delete('contest/' . $request['image']);
        $contest = Contest::find($request['id']);
        $array = [];
        foreach (json_decode($contest['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        Contest::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Contest image removed successfully!');
        return back();
    }
    public function listjoin()
    {
            $contest = Contest::where('seller_id',"!=", auth('seller')->id())->orderBy('created_at', 'desc')->get();
			$contestuser = new ContestUser();

        return view('admin-views.contest.listjoin', compact('contest','contestuser'));
    }
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
    public function categorydelete($id)
    {
        $contest = ContestCategory::find($id);
        $contest->delete();
        Toastr::success('Contest Category removed successfully!');
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
            'fund' => 'required',
        ], [
            'name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'fund.required' => 'Fund  is required!',
        ]);

        $contest = new Contest();
        $contest->seller_id = 0;
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->fund = $request->fund;
        $contest->start_date = $request->start_date;
        $contest->end_date = $request->end_date;
        $contest->start_date_1 = $request->start_date_1;
        $contest->end_date_1 = $request->end_date_1;
        $contest->start_date_2 = $request->start_date_2;
        $contest->end_date_2 = $request->end_date_2;
        $contest->start_date_3 = $request->start_date_3;
        $contest->end_date_3 = $request->end_date_3;
        $contest->contestcat = $request->contestcat;
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

    function categoryaddnew2(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'description' => 'required',
        ], [
            'category.required' => 'Contest Category is required!',
            'description.required' => 'Description  is required!',
        ]);

        $contest = new ContestCategory();
        $contest->category = $request->category;
        $contest->description = $request->description;

 
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contest->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }

    function join(Request $request) {
        $validator = Validator::make($request->all(), [
            'answer' => 'required'
        ], [
            'answer.required' => 'Answer is required!'
        ]);

        $contestuser = ContestUser::where("seller_id","=",auth('seller')->id())->where("contest_id","=",$request->id)->first();
		if(!empty($contestuser))
		{
			$contestuser->answer = $request->answer;
		}
		else
		{
			$contestuser=new ContestUser();
			$contestuser->seller_id = auth('seller')->id();
			$contestuser->contest_id = $request->id;
			$contestuser->answer = $request->answer;
		}
 

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contestuser->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
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
            'fund' => 'required',
        ], [
            'name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'fund.required' => 'Fund  is required!',
        ]);

        $contest = Contest::find($request->id);
        $contest->seller_id = 0;
        $contest->name = $request->name;
        $contest->description = $request->description;
        $contest->fund = $request->fund;
        $contest->start_date = $request->start_date;
        $contest->end_date = $request->end_date;
        $contest->start_date_1 = $request->start_date_1;
        $contest->end_date_1 = $request->end_date_1;
        $contest->start_date_2 = $request->start_date_2;
        $contest->end_date_2 = $request->end_date_2;
        $contest->start_date_3 = $request->start_date_3;
        $contest->end_date_3 = $request->end_date_3;
        $contest->contestcat = $request->contestcat;

		$product_images=json_decode($contest->picture);
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
    function categoryupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'description' => 'required',
        ], [
            'category.required' => 'Contest Category is required!',
            'description.required' => 'Description  is required!',
        ]);

        $contest = ContestCategory::find($request->id);
        $contest->category = $request->category;
        $contest->description = $request->description;
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $contest->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
}
