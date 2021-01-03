<?php
namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class NewnessSortController extends Controller implements ResultInterface {

    public function getItems($search,  $priceLowest, $priceHighest, $category) {
        if($category === null) {

            $items =  Item::whereRaw('title REGEXP "'. $search.'"')
            ->where('price', '>=', $priceLowest)
            ->where('price', '<=', $priceHighest)
            ->where('on_sell', 1)
            ->with(['itemImage', 'itemColor'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        } elseif ($category !== null) {

            $items =  Item::where('category', $category)
            ->where('price', '>=', $priceLowest)
            ->where('on_sell', 1)
            ->where('price', '<=', $priceHighest)
            ->with(['itemImage', 'itemColor'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        }
        

        return $items;
    }

}