<?php
namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class RatingSortController extends Controller implements ResultInterface {

    public function getItems($search, $priceLowest, $priceHighest, $category) {
            
        if($category === null) {

            $items =  Item::leftJoin('reviews',
            'items.id', '=', 'reviews.item_id')
            ->whereRaw('title REGEXP "'. str_replace('"', '', $search).'"')
            ->where('price', '>=', $priceLowest)
            ->where('on_sell', 1)
            ->where('price', '<=', $priceHighest)
            ->selectRaw('items.*, AVG(reviews.rate) as rate')
            ->with(['itemImage', 'itemColor'])
            ->groupBy('id')
            ->orderBy('rate', 'desc')
            ->paginate(10);
        
        }elseif ($category !== null) {

            $items =  Item::leftJoin('reviews',
            'items.id', '=', 'reviews.item_id')
            ->where('category', $category)
            ->where('on_sell', 1)
            ->where('price', '>=', $priceLowest)
            ->where('price', '<=', $priceHighest)
            ->selectRaw('items.*, AVG(reviews.rate) as rate')
            ->with(['itemImage', 'itemColor'])
            ->groupBy('id')
            ->orderBy('rate', 'desc')
            ->paginate(10);

        }

        return $items;
    }

}