<?php

namespace App\Http\Controllers\Seller;

use App\CPU\BackEndHelper;
use App\CPU\Convert;
use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Barter;
use App\Model\BarterSell;
use App\Model\BarterBuy;
use App\Model\BarterMoneySell;
use App\Model\BarterMoneyBuy;
use App\Model\Category;
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


class BarterController extends Controller
{
    function category() {
            $contestcat = ContestCategory::get();
			$seller = Seller::find(auth('seller')->id());

        return view('seller-views.contest.category', compact('contestcat','seller'));
    }
    function list() {
            $b = Barter::where(['seller_id'  => auth('seller')->id()])->orderBy('created_at', 'desc')->get();
			$seller = Seller::find(auth('seller')->id());

        return view('seller-views.barter.list', compact('b','seller'));
    }
    function listjoin() {
            $b = Barter::where('seller_id' ,'!=',auth('seller')->id())->orderBy('created_at', 'desc')->get();
			$bs=new BarterSell();
			$bb=new BarterBuy();
			$bms=new BarterMoneySell();
			$bmb=new BarterMoneyBuy();
			$category=Category::get();
			$seller = Seller::find(auth('seller')->id());

        return view('seller-views.barter.listjoin', compact('b','seller','category','bs','bb','bms','bmb'));
    }
    public function edit($id)
    {
		$seller = Seller::find(auth('seller')->id());
		$category=Category::get();
        $b = Barter::find($id);
		$bs = BarterSell::where('barter_id','=',$b->id)->get();
		$bb = BarterBuy::where('barter_id','=',$b->id)->get();
		$bms = BarterMoneySell::where('barter_id','=',$b->id)->get();
		$bmb= BarterMoneyBuy::where('barter_id','=',$b->id)->get();
        return view('seller-views.barter.selleredit', compact('b','bs','bb','bms','bmb','category','seller'));

    }
    public function categoryedit($id)
    {
			$seller = Seller::find(auth('seller')->id());
        $contest = ContestCategory::find($id);
        return view('seller-views.contest.categoryedit', compact('contest','seller'));

    }

    public function listmanage($id)
    {
            $contestcat = ContestCategory::get();
        $contest = Contest::find($id);
        $user = new User();
        $seller = new Seller();
		$contestuser = new ContestUser();
        return view('seller-views.contest.view', compact('contest','user','seller','contestuser','contestcat`'));

    }
 
    function selleradd() {
			$seller = Seller::find(auth('seller')->id());
		$category=Category::get();
        return view('seller-views.barter.selleradd',compact('category','seller'));
    }

    function categoryadd() {
//		die("add");
        return view('seller-views.contest.categoryadd');
    }
    public function remove_image_sell(Request $request)
    {
        ImageManager::delete('barter/' . $request['image']);
        $bs = BarterSell::find($request['id']);
        $array = [];
        foreach (json_decode($bs['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        BarterSell::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Barter image Sell removed successfully!');
        return back();
    }
    public function remove_image_buy(Request $request)
    {
        ImageManager::delete('barter/' . $request['image']);
        $bb = BarterBuy::find($request['id']);
        $array = [];
        foreach (json_decode($bb['picture']) as $image) {
            if ($image != $request['image']) {
                array_push($array, $image);
            }
        }
        BarterBuy::where('id', $request['id'])->update([
            'picture' => json_encode($array),
        ]);
        Toastr::success('Barter image demand removed successfully!');
        return back();
    }
    public function delete($id)
    {
        $b = Barter::find($id);
        $b->delete();
        Toastr::success('Barter removed successfully!');
        return back();
    }
    public function deleteproductbarter($id)
    {
        $bs = BarterSell::find($id);
        $bs->delete();
        Toastr::success('Barter Product removed successfully!');
        return back();
    }
    public function deleteproductbuy($id)
    {
        $bb = BarterBuy::find($id);
        $bb->delete();
        Toastr::success('Demand Product removed successfully!');
        return back();
    }
    public function deleteamountbarter($id)
    {
        $bms = BarterMoneySell::where('barter_id','=',$id);
        $bms->delete();
        Toastr::success('Barter Amount removed successfully!');
        return back();
    }
    public function deleteamountbuy($id)
    {
        $bmb = BarterMoneyBuy::where('barter_id','=',$id);
        $bmb->delete();
        Toastr::success('Demand Amount removed successfully!');
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
    function addnew(Request $request) {
        $b = new Barter();
        $b->seller_id = auth('seller')->id();
		$b->category=$request->category;
		$b->save();

		for($i=1;$i<($request->counter);$i++)
		{
			if($request['product_name'.$i]!="" && $request['quantity'.$i]!="" && $request['description'.$i]!="")
			{
				$bs= new BarterSell();
				$bs->barter_id = $b->id;
				$bs->product_name=$request['product_name'.$i];
				$bs->quantity=$request['quantity'.$i];
				$bs->description=$request['description'.$i];
				$product_images=null;
				if ($request->file('images'.$i)) {
					foreach ($request->file('images'.$i) as $img) {
						$product_images[] = ImageManager::upload('barter/', 'png', $img);
					}
					$bs->picture = json_encode($product_images);
				}
				$bs->save();

			}
		}

		for($i=1;$i<($request->counterbuy);$i++)
		{
			if($request['product_buy_name'.$i]!="" && $request['quantity_buy'.$i]!="" && $request['description_buy'.$i]!="")
			{
				$bb= new BarterBuy();
				$bb->barter_id = $b->id;
				$bb->product_name=$request['product_buy_name'.$i];
				$bb->quantity=$request['quantity_buy'.$i];
				$bb->description=$request['description_buy'.$i];
				$product_images=null;
				if ($request->file('imagesbuy'.$i)) {
					foreach ($request->file('imagesbuy'.$i) as $img) {
						$product_images[] = ImageManager::upload('barter/', 'png', $img);
					}
					$bb->picture = json_encode($product_images);
				}
				$bb->save();

			}
		}
		
		if(isset($request['amount']))
		{
			$bms=new BarterMoneySell();
			$bms->barter_id=$b->id;
			$bms->amount=$request['amount'];
			$bms->save();
		}
		if(isset($request['amount_buy']))
		{
			$bmb=new BarterMoneyBuy();
			$bmb->barter_id=$b->id;
			$bmb->amount=$request['amount_buy'];
			$bmb->save();
		}		
		return response()->json([], 200);
    }

    function updateproducts(Request $request) {
        $b = Barter::find($request->id);

		for($i=1;$i<($request->counter);$i++)
		{
			if($request['product_name'.$i]!="" && $request['quantity'.$i]!="" && $request['description'.$i]!="")
			{
				$bs= new BarterSell();
				$bs->barter_id = $b->id;
				$bs->product_name=$request['product_name'.$i];
				$bs->quantity=$request['quantity'.$i];
				$bs->description=$request['description'.$i];
				$product_images=null;
				if ($request->file('images'.$i)) {
					foreach ($request->file('images'.$i) as $img) {
						$product_images[] = ImageManager::upload('barter/', 'png', $img);
					}
					$bs->picture = json_encode($product_images);
				}
				$bs->save();

			}
		}

		for($i=1;$i<($request->counterbuy);$i++)
		{
			if($request['product_buy_name'.$i]!="" && $request['quantity_buy'.$i]!="" && $request['description_buy'.$i]!="")
			{
				$bb= new BarterBuy();
				$bb->barter_id = $b->id;
				$bb->product_name=$request['product_buy_name'.$i];
				$bb->quantity=$request['quantity_buy'.$i];
				$bb->description=$request['description_buy'.$i];
				$product_images=null;
				if ($request->file('imagesbuy'.$i)) {
					foreach ($request->file('imagesbuy'.$i) as $img) {
						$product_images[] = ImageManager::upload('barter/', 'png', $img);
					}
					$bb->picture = json_encode($product_images);
				}
				$bb->save();

			}
		}
		
		if(isset($request['amount']))
		{
			$bms=new BarterMoneySell();
			$bms->barter_id=$b->id;
			$bms->amount=$request['amount'];
			$bms->save();
		}
		if(isset($request['amount_buy']))
		{
			$bmb=new BarterMoneyBuy();
			$bmb->barter_id=$b->id;
			$bmb->amount=$request['amount_buy'];
			$bmb->save();
		}		
		return response()->json([], 200);
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
    function updateamountsell(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ], [
            'id.required' => 'ID is required! You got error in your posting. Please refresh!!'
        ]);

        $bms = BarterMoneySell::where("barter_id","=",$request->id)->first();
		if(!empty($bms))
		{
			$bms->amount = $request->amount_sell;
		}
 

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $bms->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function updateamountbuy(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ], [
            'id.required' => 'ID is required! You got error in your posting. Please refresh!!'
        ]);

        $bmb = BarterMoneyBuy::where("barter_id","=",$request->id)->first();
		if(!empty($bmb))
		{
			$bmb->amount = $request->amount_buy;
		}
 

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $bmb->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function updatebarter(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'required'
        ], [
            'category.required' => 'Category is required! You got error in your posting. Please refresh!!'
        ]);

        $b = Barter::find($request->id);
		if(!empty($b))
		{
			$b->category = $request->category;
		}
 

 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $b->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function editproductsell(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ], [
            'product_name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'quantity.required' => 'Fund  is required!',
        ]);

        $bs = BarterSell::find($request->id);
        $bs->product_name = $request->product_name;
        $bs->description = $request->description;
        $bs->quantity = $request->quantity;

		$product_images=json_decode($bs->picture);
        if ($request->file('imagesdb'.$request->id)) {
            foreach ($request->file('imagesdb'.$request->id) as $img) {
                $product_images[] = ImageManager::upload('barter/', 'png', $img);
            }
            $bs->picture = json_encode($product_images);
        }
		
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $bs->save();

        return response()->json([], 200);
        // Toastr::success('Product added successfully!');
        // return redirect()->route('seller.product.list');
    }
    function editproductbuy(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ], [
            'product_name.required' => 'Contest name is required!',
            'description.required' => 'Description  is required!',
            'quantity.required' => 'Fund  is required!',
        ]);

        $bb = BarterBuy::find($request->id);
        $bb->product_name = $request->product_name;
        $bb->description = $request->description;
        $bb->quantity = $request->quantity;

		$product_images=json_decode($bb->picture);
        if ($request->file('imagesdbbuy'.$request->id)) {
            foreach ($request->file('imagesdbbuy'.$request->id) as $img) {
                $product_images[] = ImageManager::upload('barter/', 'png', $img);
            }
            $bb->picture = json_encode($product_images);
        }
		
 
        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $bb->save();

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
