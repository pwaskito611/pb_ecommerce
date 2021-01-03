<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemColor;
use App\Http\Requests\ItemRequest;

class UpdateController extends Controller
{
    public function index (ItemRequest $request) {
        $item = $request->all();

        //update table items
        $update = Item::findOrFail($item['id']);
        $update->update($item);

        //update table item color
            //delete color  item
        ItemColor::where('item_id', $request->id)->delete();

            //insert color
        for($i= 1; $i <10; $i++) {
            if(isset($item['color-'.$i])){
               $insert['item_id'] = $request->id;
               $insert['color'] = $item['color-'.$i];
               ItemColor::create($insert);
            }
        }
        
        
        return redirect()->route('show-item');
    }
}
