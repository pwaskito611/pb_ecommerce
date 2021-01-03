<?php

namespace App\Http\Controllers\Admin\Transaction;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class UnconfirmedOrderController extends Controller
{
    public function index (Request $request) {

        $data = Transaction::join('transaction_details',
        'transaction_details.transaction_id', '=', 'transactions.id')
        ->join('items', 'items.id', '=', 'transaction_details.item_id')
        ->where('status', 'COMPLETED')
        ->where('confirmed_at', null)
        ->with(['user', 'item']) 
        ->paginate(10);

        return view('pages.admin.transaction', [
            'data' => $data
        ]);    
    }
}
