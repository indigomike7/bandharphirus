<?php

namespace App\Http\Controllers\Seller;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Contest;
use App\Model\ContestUser;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ContestController extends Controller
{
    function list() {
            $contest = Contest::where(['seller_id' => auth('seller')->id()])->orderBy('created_at', 'desc')->get();

        return view('seller-views.contest.list', compact('contest'));
    }
    public function edit($id)
    {
        $contest = Contest::find($id);
        return view('seller-views.contest.edit', compact('contest'));

    }

 
    function add() {
        return view('seller-views.contest.add');
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
    public function listjoin()
    {
            $contest = Contest::where('seller_id',"!=", auth('seller')->id())->orderBy('created_at', 'desc')->get();
			$contestuser = new ContestUser();

        return view('seller-views.contest.listjoin', compact('contest','contestuser'));
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
    function addnew(Request $request) {
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
        $contest->seller_id = auth('seller')->id();
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
        $contest->seller_id = auth('seller')->id();
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
}