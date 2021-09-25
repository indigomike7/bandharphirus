<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Model\Review;
use App\Model\Seller;

class ReviewsController extends Controller
{
    function list() {
			$seller = Seller::find(auth('seller')->id());

        $sellerId = auth('seller')->id();
        // $product = Product::with('reviews')->where('user_id', $sellerId)->where('added_by', 'seller')->get();

        $reviews = Review::with(['product' => function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId)->where('added_by', 'seller');
        }])->latest()->paginate(20);
        // dd($reviews)->toArray();
        return view('seller-views.reviews.list', compact('reviews','seller'));

    }
}
