<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{   
  
    public function index () {
       $chart = Chart::where('user_id', Auth::user()->id)->get();
        
        $i = 0;
        foreach($chart as $c) {
           $itemID[$i] = $c->item_id;
            $i++;
        }  
 
       $items = Item::whereIn('id', $itemID)
       ->where('on_sell', 1)
       ->with(['itemColor'])   
       ->get();   

        return view('pages.order-detail', [
            'items' => $items
        ]);
    }
  
}
