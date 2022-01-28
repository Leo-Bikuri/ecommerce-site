<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class StripeController extends Controller
{
    protected $seek;
    
    public function index()
    {
        return view('Client/payment');
    }
        
    public function stripePayment()
    {
        $this->seek = service('request');
        require_once('application/libraries/stripe-php/init.php');
        $stripeSecret = 'sk_test_51KL2ppAv3yHCdNvTCmhwfsgIb9RCNjLaHAJUKgwpmjJllKJ95stLVDEJ7CVrIKQK9qlJSMlbAPTPC0wliq2tExaU00lG1V0IZJ';
    
            \Stripe\Stripe::setApiKey($stripeSecret);
        
            $stripe = \Stripe\Charge::create ([
                    "amount" => $this->seek->getVar('amount'),
                    "currency" => "usd",
                    "source" => $this->seek->getVar('pk_test_51KL2ppAv3yHCdNvTeRaZr5Ek3glyEeCOGW1lVBFzSjHx0DUMAn44bOulpIJcfR2QDKC3z9DyMe4igfoTrnMHJjMk00frEspLE7x'),
                    "description" => "You have just made the test payments."
            ]);
                
            $paymentData = array('success' => true, 'data'=> $stripe);
            
            echo '<pre>' , var_dump($paymentData) , '</pre>';

    }   

}