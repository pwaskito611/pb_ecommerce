<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{   
  
    public function index () {
       
       $items = Item::whereIn('id', function($query) {
            $query->select('item_id')
            ->from('Charts')  
            ->where('user_id', Auth::user()->id);
       })
       ->get();

        return view('pages.order-detail', [
            'items' => $items
        ]);
    }
  
}
