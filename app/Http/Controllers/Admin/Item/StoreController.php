<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemColor;
use App\Http\Requests\ItemRequest;

class StoreController extends Controller
{
    public function index (ItemRequest $request) {
        $item = $request->all();

        //insert data to items table
        $itemID = Item::create($item)->id;

        //insert data to item color table
        for($i= 1; $i <10; $i++) {
            if(isset($item['color-'.$i])){
               $insert['item_id'] = $itemID;
               $insert['color'] = $item['color-'.$i];
               ItemColor::create($insert);
            }
        }
      
        return redirect()->route('show-item');
    }
}
