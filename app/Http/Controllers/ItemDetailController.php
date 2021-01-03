<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Review;
use App\Models\Chart;
use App\Models\ItemColor;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth; 

class ItemDetailController extends Controller
{
    public function index (Request $request) {
        $item = Item::with(['itemImage', 'itemColor'])
        ->findOrFail($request->id);

        $reviews = Review::where('item_id', $request->id)
        ->with(['user'])
        ->paginate(10);  

        $color = ItemColor::where('item_id', $request->id)->get();

        $chart = null;
        $isPurchased = null;

        if(Auth::check()) {
            $chart = Chart::where('item_id', $request->id)
            ->where('user_id', Auth::user()->id)
            ->first();

            $isPurchased = Transaction::join('transaction_details',
            'transactions.id' ,'=', 'transaction_details.transaction_id')
            ->where('transaction_details.item_id', $request->id)
            ->where('transactions.buyer_id', Auth::user()->id)
            ->where('transactions.status', 'COMPLETED')
            ->select('transactions.id')
            ->first();

        }
        
        return view('pages.itemdetail', [
            'item' => $item,
            'reviews' => $reviews, 
            'chart' => $chart,
            'color' => $color,
            'isPurchased' => $isPurchased,
        ]);
    }
}
