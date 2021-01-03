<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemImage;

use App\Http\Requests\IDRequest;

class EditImageController extends Controller
{
    public function index (IDRequest $reqeust) {
        $id = $reqeust->id;
        $image = ItemImage::where('item_id', $reqeust->id)->get();

        return view('pages.admin.item.edit-image', [
            'image' => $image,
            'id' => $id,
        ]);
    }
}
