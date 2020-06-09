<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\Payment;
use Carbon\Carbon;
use PaytmWallet;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $payment = $user->payment()->count();

        if($payment){
            return redirect('payment/success'); 
        }

        return view('payment');
    }
    
    public function pay(Request $request){
        
        $user = $request->user();
        $payment = $user->payment()->count();

        if($payment){
            return redirect('payment/success'); 
        }
        
        $email = ($user->email) ? $user->email :
            str_replace(' ', '', $user->name).User::DEFAULT_MAIL;
        
        $payment = PaytmWallet::with('receive');
       
        $payment->prepare([
          'order' => Carbon::now()->timestamp,
          'user' => $user->id,
          'mobile_number' => $user->number,
          'email' => $email,
          'amount' => Payment::DEFAULT_PRICE,
          'callback_url' => url('payment/success')
        ]);

        return $payment->receive();     

    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function callbackUrl(Request $request)
    {
        $user = auth()->user();
        $payment = $user->payment();

        if($payment->count()){
           return redirect('payment/success'); 
        }

        $status = PaytmWallet::with('receive');
        
        $response = $status->response();

        $msg = $status->getResponseMessage();

        if($status->isFailed()){
           return redirect('/payment')
                ->withErrors($msg);
        }else if($status->isSuccessful()){
          //Transaction Successful
        }else if($status->isOpen()){
          //Transaction Open/Processing
        }
      
        $input = [
         'transaction_id' =>  $status->getTransactionId(),
         'payment_status' =>  $response['STATUS'],
         'payment_info' =>  json_encode($response),
         'amount' =>  $response['TXNAMOUNT'],
        ];

        if(!$payment->count()){
          $payment->create($input);
        }    
       
        return view('payment-success',$response);
        
    }


    public function success(){
      $user = auth()->user();
      $payment = $user->payment()->first();
      
      if(!$payment){
        return redirect('/payment');
      }

      $response = json_decode($payment->payment_info,true);
  
      return view('payment-success',$response);
    }

}
