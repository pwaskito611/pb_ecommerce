<?php
namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class PopularSortController extends Controller implements ResultInterface {

    public function getItems($search, $priceLowest, $priceHighest, $category) {
        
        if($category === null) {
            
            $items =  Item::leftJoin('transactions',
            'items.id', '=', 'transactions.item_id')
            ->whereRaw('title REGEXP "'. $search.'"')
            ->where('price', '>=', $priceLowest)
            ->where('on_sell', 1)
            ->where('price', '<=', $priceHighest)
            ->selectRaw('items.*, COUNT(transactions.item_id) as total')
            ->with(['itemImage', 'itemColor'])
            ->groupBy('id')
            ->orderBy('total', 'desc')
            ->paginate(10);

        } elseif ($category !== null) {

            $items =  Item::leftJoin('transactions',
            'items.id', '=', 'transactions.item_id')
            ->where('category', $category)
            ->where('on_sell', 1)
            ->where('price', '>=', $priceLowest)
            ->where('price', '<=', $priceHighest)
            ->selectRaw('items.*, COUNT(transactions.item_id) as total')
            ->with(['itemImage', 'itemColor'])
            ->groupBy('id')
            ->orderBy('total', 'desc')
            ->paginate(10);
        }

        return $items;
    }

}