<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Controllers\Controller;


class ShowChartController extends Controller
{
    public function index (Request $request) {
        $items = Item::join('Charts', 
        'items.id', '=', 'Charts.item_id') 
        ->selectRaw('items.*')
        ->where('on_sell', 1)
        ->where('user_id', Auth::user()->id)
        ->with(['itemImage', 'itemColor', 'review', 'chart'])
        ->paginate(12);

        return view('pages.chart', [
            'items'=> $items,
        ]);  
    }
}
