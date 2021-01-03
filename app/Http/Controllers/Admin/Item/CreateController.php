<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class CreateController extends Controller
{
    public function index () {
        return view('pages.admin.item.create');
    }
}
