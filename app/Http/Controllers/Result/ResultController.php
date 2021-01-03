<?php

namespace App\Http\Controllers\Result;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\SearchRequest;
use \stdClass;

class ResultController extends Controller
{
    public function index(SearchRequest $request)
    { 
        $price = explode('-', $request->price);
        $priceLowest =  empty($price[0]) ? 0 : $price[0]; 
        $priceHighest =  empty($price[1]) ? 99999999999 : $price[1];

        $request->orderBy=empty($request->orderBy) ? 'Default' : $request->orderBy;

        $items = app('App\Http\Controllers\Result\\'.$request->orderBy.'SortController')->getItems($request->search,
        $priceLowest, $priceHighest, $request->category); 

        return view('pages.search-result', [
            'items' => $items,
            'search' => $request->search,
            'category' => $request->category ,
            'orderBy' => $request->orderBy,
            'price' => empty($request->price) ? '0-99999999999' : $request->price, 
        ]);
    }
}
