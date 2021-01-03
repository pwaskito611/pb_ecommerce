<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Review;
use \Redirect;

class PostReviewController extends Controller
{
    public function index (Request $request) {

        $check = Transaction::join('transaction_details',
        'transaction_details.transaction_id', '=', 'transactions.id')
        ->select('transaction_details.item_id')
        ->where('buyer_id', Auth::user()->id)
        ->where('item_id', $request->item_id)
        ->where('status', 'COMPLETED')
        ->first();

        Review::updateOrCreate(
            [
                'item_id' => $request->item_id,
                'assessor_id' => Auth::user()->id
            ],
            [   
                'rate' => $request->rate,
                'item_id' => $request->item_id,
                'comments' => $request->comments,
            ]
         );


         return Redirect::back();
    }
}
