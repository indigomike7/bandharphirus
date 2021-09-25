<?php

namespace App\CPU;

use App\Model\Collection;
use App\Model\Product;

class CollectionManager
{
    public static function parents()
    {
        $x = Collection::with(['childes.childes'])->where('position', 0)->get();
        return $x;
    }

    public static function child($parent_id)
    {
        $x = Collection::where(['parent_id' => $parent_id])->get();
        return $x;
    }

    public static function products($category_id)
    {
        $products = Product::active()->get();
        $product_ids = [];
        foreach ($products as $product) {
            foreach (json_decode($product['collection_ids'], true) as $category) {
                if ($collection['id'] == $collection_id) {
                    array_push($product_ids, $product['id']);
                }
            }
        }
        return Product::whereIn('id', $product_ids)->get();
    }
}
