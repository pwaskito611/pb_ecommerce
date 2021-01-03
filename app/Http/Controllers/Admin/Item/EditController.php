<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemColor;
use App\Http\Requests\IDRequest;

class EditController extends Controller
{
    public function index (IDRequest $request) {
        $item = Item::findOrFail($request->id);
        $colors = ItemColor::where('item_id', $request->id)->get();

        return view('pages.admin.item.edit', [
            'item' => $item,
            'colors' => $colors,
        ]);
    }
}
