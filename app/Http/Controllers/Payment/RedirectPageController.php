<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use \Redirect;

class RedirectPageController extends Controller
{   
    private $chartUser;
    private $transactionID;

    public function index (Request $request) {
        $request = $request->all();

        //validation user input
        $validation = $this->validation($request);

        if(!$validation) {
            return Redirect::back();
        }

        //get total price from user chart
        $total = $this->getTotal($request);

        //create order payment paypal
        $result = $this->createOrderPaypal($total);
    
        //link for payment page from request paypal api
       
        $link = $result->links[1]->href;

        //store transacrtion data to databases
        $this->recordTransactions($result, $total, $request['address'], $request['contact']);
        $this->recordTransactionDetails($request);
        

        return view('pages.redirect-page', [
            'link' => $link
        ]);
    }

    public function validation($request) {
        for($i= 0; $i>=0; $i++) {

            if(!isset($request['quantity-'. $i]) && !isset($request['color-'. $i])) {
            break;
            }

            if(!is_numeric($request['quantity-'.$i]) || !is_string($request['color-'.$i]) ){
                return false;
            }

            if($request['color-'.$i] != 'red' && $request['color-'.$i] !='orange'
                && $request['color-'.$i] != 'yellow' && $request['color-'.$i] != 'green'
                && $request['color-'.$i] != 'blue' && $request['color-'.$i] != 'purple'
                && $request['color-'.$i] != 'black' && $request['color-'.$i] != 'white'
                && $request['color-'.$i] != 'pink' ) 
            {       
                    return false; 
            }
        }

        if(!is_string($request['contact'])) {
            return false;
        }

        if(!is_string($request['address'])) {
            return false;
        }

        return true;
    } 

    public function getTotal($request) {
        $this->chartUser = Chart::where('user_id', Auth::user()->id)
        ->with(['item'])
        ->get(); 
      
        $total = 0;
        $i = 0;
        foreach($this->chartUser as $chartUser) {
    
            $total = $total + ($chartUser->item->price * $chartUser->item->discount / 100) * $request['quantity-'.$i];
            $i++;
    
        }

        return $total;
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

    public function createOrderPaypal($total) {
        $ch = curl_init();
            
        $body = array (
            'intent' => 'CAPTURE',
            'purchase_units' => 
            array (
              0 => 
              array (
                'amount' => 
                array (
                  'currency_code' => 'USD',
                  'value' => $total,
                ),
              ),
            ),
        );

        $body = json_encode($body);

        curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v2/checkout/orders');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '. $this->getAccessToken();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        
        $result = json_decode($result);

        return $result;
    }

    public function recordTransactions ($result, $total, $address, $contact) {
        $transaction = new Transaction;
        
        $transaction->paypal_order_id = $result->id;
        $transaction->buyer_id = Auth::user()->id;
        $transaction->total = $total;
        $transaction->address = $address;
        $transaction->status = 'CREATED';
        $transaction->contact = $contact;
        $transaction->created_at = date('Y/m/d h:i:s');
        $transaction->save();

        $this->transactionID = $transaction->id;
    }

    public function recordTransactionDetails($request) {

       for($i = 0; $i >= 0; $i++ ){
           if(!isset($this->chartUser[$i])){
                break;
           }

           $detail = new TransactionDetail;
           $detail->transaction_id = $this->transactionID;
           $detail->item_id = $this->chartUser[$i]->item_id;
           $detail->quantity = $request['quantity-'.$i];
           $detail->color = $request['color-'.$i];
           $detail->save();

       }
    }
}