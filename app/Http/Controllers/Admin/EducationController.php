<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Education;
use App\Model\EducationCategory;
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


class EducationController extends Controller
{
    function list() {
            $e = Education::get();

        return view('admin-views.education.list', compact('e'));
    }
    public function edit($id)
    {
            $ec = EducationCategory::get();
        $e = Education::find($id);
        return view('admin-views.education.edit', compact('ec','e'));

    }
    function add() {
            $ec = EducationCategory::get();
        return view('admin-views.education.add',compact('ec'));
    }

    public function remove_image(Request $request)
    {
        ImageManager::delete('education/' . $request['image']);
        $e = Education::find($request['id']);
        $array = [];
        foreach (json_decode($e['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        Education::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Education image removed successfully!');
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
        $e = Education::find($id);
		if($e['images']!=null){
        foreach (json_decode($e['images'], true) as $image) {
            ImageManager::delete('education/' . $image);
        }}
        $e->delete();
        Toastr::success('Education removed successfully!');
        return back();
    }
    function addnew2(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Title is required!',
            'description.required' => 'Description  is required!',
            'category.required' => 'Category  is required!',
        ]);

        $e = new Education();
        $e->title= $request->title;
        $e->description = $request->description;
        $e->category = $request->category;

 
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('education/', 'png', $img);
            }
            $e->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $e->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }

    function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Title is required!',
            'description.required' => 'Description  is required!',
            'category.required' => 'Category  is required!',
        ]);

        $e = Education::find($request->id);
        $e->title = $request->title;
        $e->description = $request->description;
        $e->category = $request->category;

		$product_images=json_decode($e->picture);
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('education/', 'png', $img);
            }
            $e->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $e->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
}
