<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Item;
use \Redirect;

 
class UserOrderController extends Controller
{
    public function index () {
        //get trnasaciton data from database for checking 
        $data = Transaction::where('status', 'CREATED')
        ->where('buyer_id', Auth::user()->id)
        ->get();

        //must get access token before use api
        $accessToken = $this->getAccessToken();

        //loop for check and update status of transaction using paypal api
        foreach($data as $d) {
            $check = $this->checkOrderStatus($accessToken, $d->paypal_order_id);

            if($check == 'COMPLETED') {        
                $update = Transaction::find($d->id);
                $update->status = $check;
                $update->save();
            }

        }
  
        $items = TransactionDetail::whereIn('transaction_id', function($query){
            $query->select('id')
            ->from('transactions')
            ->where('status', 'COMPLETED')
            ->where('buyer_id', Auth::user()->id);
        })
        ->with(['transaction', 'ItemImage', 'item'])
        ->paginate(12);



        return view('pages.my-order', [
            'items' => $items
        ]);
    }

    public function getAccessToken() {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api-m.paypal.com/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_USERPWD,  env('CLIENT_ID') . ':' . env('SECRET'));

        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Accept-Language: en_US';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result = json_decode($result);
    
        return $result->access_token;
    }

    public function checkOrderStatus($accessToken, $paypalOderID) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v2/checkout/orders/'. $paypalOderID);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '. $accessToken;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result);
        
        if(!isset($result->details[0]->issue)){
            return $result->status;
        }

        return null;
    }
}
