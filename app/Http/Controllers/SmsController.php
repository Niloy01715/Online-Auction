<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Exception;


class SmsController extends Controller
{
    public function index()
    {
        return view('backend.sms.index');
    }
    public function smssend(Request $request)
    {
        $recieve_number = $request->number;
        // $message = "Welcome to TECHWEB";
        $message = $request->message;

        try{
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_no = getenv("TWILIO_FROM");

            $client = new Client($account_sid,$auth_token);
            $client->messages->create($recieve_number,[
                'from' => $twilio_no,
                'body'=> $message
            ]);
            return redirect()->back();
        }catch(Exception $e){
            //
        }
    }
}
