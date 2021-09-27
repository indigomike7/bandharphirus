<?php

namespace App\Http\Controllers\Admin;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
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


class EducationCategoryController extends Controller
{
    function category() {
		$ec = EducationCategory::get();
        return view('admin-views.education.category', compact('ec'));
    }
    public function categoryedit($id)
    {
        $ec = EducationCategory::find($id);
        return view('admin-views.education.categoryedit', compact('ec'));

    }


    function categoryadd() {
//		die("add");
        return view('admin-views.education.categoryadd');
    }
    public function remove_image2(Request $request)
    {
        ImageManager::delete('contest/' . $request['image']);
        $ec = EducationCategory::find($request['id']);
        $array = [];
        foreach (json_decode($ec['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        EducationCategory::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Education Category image removed successfully!');
        return back();
    }
    public function categorydelete($id)
    {
        $ec = EducationCategory::find($id);
        $ec->delete();
        Toastr::success('Education Category removed successfully!');
        return back();
    }
    function categoryaddnew2(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'description' => 'required',
        ], [
            'category.required' => 'Category is required!',
            'description.required' => 'Description  is required!',
        ]);

        $ec = new EducationCategory();
        $ec->category = $request->category;
        $ec->description = $request->description;

 
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('education/', 'png', $img);
            }
            $ec->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $ec->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }


    function categoryupdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'description' => 'required',
        ], [
            'category.required' => 'Category is required!',
            'description.required' => 'Description  is required!',
        ]);

        $ec = EducationCategory::find($request->id);
        $ec->category = $request->category;
        $ec->description = $request->description;

		$product_images=json_decode($ec->picture);
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('education/', 'png', $img);
            }
            $ec->picture = json_encode($product_images);
        }

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $ec->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
}
