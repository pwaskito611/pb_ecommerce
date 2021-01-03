<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index () {
        $transactionsToday = Transaction::where('created_at', date('Y/m/d'))
        ->where('status', 'COMPLETED')
        ->count();
        
        $transactionsThisWeek = Transaction::where('created_at', '>=',  date('Y-m-d',strtotime('last Monday')))
        ->where('status', 'COMPLETED')
        ->count();

        $transactionsThisMonth = Transaction::where('created_at', '>=',   date('Y-m-1'))
        ->where('status', 'COMPLETED')
        ->count();

        return view('pages.admin.dashboard', [
            'today' => $transactionsToday,
            'thisWeek' => $transactionsThisWeek,
            'thisMonth' => $transactionsThisMonth,
        ]);
    }
}
