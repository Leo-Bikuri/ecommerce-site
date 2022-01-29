<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Controllers\OrderController;
use phpDocumentor\Reflection\DocBlock\Description;
use Stripe;


class StripeController extends Controller
{
    protected $seek;
    
    public function index()
    {
        return view('Client/checkout');
    }
    public function __construct()
    {
        helper(["url"]);
    }
        
    public function payment()
    {
        $this->seek = Service('request');
        Stripe\Stripe::setApiKey(STRIPE_SECRET);
         
        $stripe = Stripe\Charge::create ([
            'amount' => $this->seek->getVar('amount'),
            'currency' => 'usd',
            'source'=>$_REQUEST['stripeToken'],
            'description' => 'Payment through style'
        ]);

        $data = array('success'=> true, 'data'=>$stripe);
        // echo json_encode($data);
        $order = new OrderController();
        $order->store('Stripe Payment');

        session()->setFlashdata("message", "Payment done successfully");
        session()->set('payment', 'Stripe Payment');

        return redirect('receipt');

    }   

}