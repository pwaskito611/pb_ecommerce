<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller 
{
    public function index () {
        $items = Item::with(['itemColor', 'itemImage', 'chart'])
        ->where('on_sell', 1)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        return view('pages.home', [
            'items' => $items,
        ]);
    }
}
 