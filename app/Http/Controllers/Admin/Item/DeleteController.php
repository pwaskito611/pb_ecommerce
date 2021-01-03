<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Charts;
use App\Http\Requests\IDRequest;

class DeleteController extends Controller
{
    public function index (IDRequest $request) {
        
        $item = Item::findOrFail($request->id);
        $item->delete();

        $chart = Chart::where('item_id', $request->id)->delete();
        
        
        return redirect()->route('show-item');
    }
}
