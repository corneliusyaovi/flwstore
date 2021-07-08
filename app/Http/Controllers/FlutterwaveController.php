<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flutterwave\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    public function initialize() {
      //This initializes payment and redirects to the payment gateway
      //The initialize method takes the parameter of the redirect URL
      Flutterwave::initialize(route('callback'));  
    }

    public function callback(Request $request) {
        // This verifies the transaction and takes the parameter of the transaction reference

        $data = json_decode($request->resp, true);

        // dd($data);

        $data = Flutterwave::verifyTransaction($data['tx']['txRef']);
    
        

        $chargeResponsecode = $data->data->chargecode;
        $chargeAmount = $data->data->amount;
        $chargeCurrency = $data->data->currency;
    
        
        $amount = 500;
        $currency = "NGN";
    
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        //Give Value and return to Success page
        
            return redirect('/success');
        
        } else {
            //Dont Give Value and return to Failure page
        
            return redirect('/failed');
        }
    
        // dd($data->data);
    }

}
