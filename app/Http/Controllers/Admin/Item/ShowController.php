<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ShowController extends Controller
{
    public function index (Request $request) {
        
        if($request->search != null) {
            $items = Item::whereRaw("title regexp '". $request->search . "'")->paginate(10);

            return view('pages.admin.item.show', [
                'items' => $items
            ]);
        }

        $items = Item::paginate(10);

        return view('pages.admin.item.show', [
            'items' => $items
        ]);    
    }
}
