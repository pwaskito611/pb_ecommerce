<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemImage;
use App\Http\Requests\ItemImageRequest;
use Redirect;


class StoreImageController extends Controller
{
    public function index (ItemImageRequest $request) {

        /*
        *you must make variabel($url) before store to databases
        */

        //store new image to storage
        $path = $request->file('image')->store('/public/assets/ItemImage');
        $path2 = explode('/', $path);
        $url = '/storage/'.$path2[1].'/'.$path2[2].'/'.$path2[3];

        //store data to databases
        $insert = new ItemImage();
        $insert->image_url = $url;
        $insert->item_id = $request->id;
        $insert->save();

        
        return Redirect::back();
    }
}
