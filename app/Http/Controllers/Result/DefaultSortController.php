<?php
namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item; 

class DefaultSortController extends Controller implements ResultInterface {

    public function getItems($search,  $priceLowest, $priceHighest, $category) {
       if($category === null) {
            $items =  Item::whereRaw('title REGEXP "'. str_replace('"', '', $search) .'"')
            ->where('price', '>=', $priceLowest)
            ->where('price', '<=', $priceHighest)
            ->where('on_sell', 1)
            ->with(['itemImage', 'itemColor', 'chart'])
            ->paginate(10);
       }elseif($category !== null) {
            $items =  Item::where('price', '>=', $priceLowest)
            ->where('price', '<=', $priceHighest)
            ->where('category', $category)
            ->where('on_sell', 1)
            ->with(['itemImage', 'itemColor', 'chart'])
            ->paginate(10);
       }

        return $items;
    }

}