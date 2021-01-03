<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use App\Http\Controllers\Controller;
use \Redirect;
  

class CreateChartController extends Controller
{
    public function index (Request $request) {

       $insert = Chart::upsert([
           'item_id' => $request->item_id,
           'user_id' => Auth::user()->id,
       ],[
        'item_id' => $request->item_id,
        'user_id' => Auth::user()->id,
       ]);

        return Redirect::back();
    }
}
