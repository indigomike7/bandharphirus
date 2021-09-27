<?php

namespace App\Http\Controllers\Admin;
use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Collection;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index()
    {
        $categories=Collection::where(['position'=>0])->latest()->paginate(10);
        return view('admin-views.collection.view',compact('categories'));
    }

    public function add()
    {
        $categories=Collection::where(['position'=>0])->latest()->paginate(10);
        return view('admin-views.collection.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Collection name is required!',
            'description.required' => 'Description  is required!',
        ]);

        $collection = new Collection;
        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->slug = Str::slug($request->name);
        $collection->parent_id = $request->parent_id;
        $collection->position = 0;
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('collection/', 'png', $img);
            }
            $collection->icon = json_encode($product_images);
        }

		$product_images=null;
        if ($request->file('images2')) {
            foreach ($request->file('images2') as $img) {
                $product_images[] = ImageManager::upload('collection/', 'png', $img);
            }
            $collection->pictures = json_encode($product_images);
        }

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }
        $collection->save();

        return response()->json([], 200);
    }

    public function remove_image(Request $request)
    {
        ImageManager::delete('collection/' . $request['image']);
        $collection = Collection::find($request['id']);
        $array = [];
        foreach (json_decode($collection['icon']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        Collection::where('id', $request['id'])->update([
            'icon' => json_encode($array),
        ]);
        Toastr::success('Collection icon removed successfully!');
        return back();
    }
    public function remove_image2(Request $request)
    {
        ImageManager::delete('collection/' . $request['image']);
        $collection = Collection::find($request['id']);
        $array = [];
        foreach (json_decode($collection['pictures']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        Collection::where('id', $request['id'])->update([
            'pictures' => json_encode($array),
        ]);
        Toastr::success('Collection picture removed successfully!');
        return back();
    }
    public function edit(Request $request)
    {
        $collection = Collection::find($request['id']);
        $categories=Collection::where(['position'=>0])->where('id','!=',$request['id'])->latest()->paginate(10);
        return view('admin-views.collection.edit',compact('categories','collection'));
    }

    public function update(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Collection name is required!',
            'description.required' => 'Description  is required!',
        ]);

        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }
       $collection = Collection::find($request->id);
        $collection->name = $request->name;
        $collection->slug = Str::slug($request->name);
        $collection->description = $request->description;
		$product_images=json_decode($collection->icon);
        if ($request->file('images')) {
            foreach ($request->file('images') as $img) {
                $product_images[] = ImageManager::upload('collection/', 'png', $img);
            }
            $collection->icon = json_encode($product_images);
        }

		$product_images=json_decode($collection->pictures);
        if ($request->file('images2')) {
            foreach ($request->file('images2') as $img) {
                $product_images[] = ImageManager::upload('collection/', 'png', $img);
            }
            $collection->pictures = json_encode($product_images);
        }
 
        $collection->parent_id = $request->parent_id;
        $collection->position = 0;
        $collection->save();
        // return response()->json();
        Toastr::success('Collection updated successfully!');

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
//        $categories = Collection::where('id', $request->id)->get();
        Collection::destroy($request->id);
        return back();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('position', 0)->orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }
}
