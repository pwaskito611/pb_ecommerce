<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use App\Http\Controllers\Controller;
use \Redirect;

class DeleteChartController extends Controller
{
    public function index (Request $request) {
 
        Chart::where('item_id', $request->item_id)
        ->where('user_id', Auth::user()->id)
        ->delete();

        return Redirect::back();
    }
}
