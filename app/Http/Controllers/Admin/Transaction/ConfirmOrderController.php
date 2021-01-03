<?php

namespace App\Http\Controllers\Admin\Transaction;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Redirect;
  
class ConfirmOrderController extends Controller
{
    public function index (Request $request) {

        $data['confirmed_at'] = date("Y-m-d");
 
        $update = Transaction::findOrFail($request->id);
        $update->update($data); 

        return Redirect::back();
    }
}
