<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemImage;
use App\Http\Requests\IDRequest;
use Redirect;

class DeleteImageController extends Controller
{
    public function index (IDRequest $request) {
        
        $update = ItemImage::findOrFail($request->id);
        $update->delete();
        
        return Redirect::back();
    }
}
