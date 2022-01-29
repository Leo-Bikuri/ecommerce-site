<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\OrderDetailsModel;
use App\Models\PaymentTypes;


class OrderController extends BaseController
{

    public function store($payment_type){
            $cart = \Config\Services::cart();
            $order = new OrderModel();
            $orderdetails = new OrderDetailsModel();
            $payment = new PaymentTypes();
            $payment_id = $payment->select('paymenttype_id')->where('paymenttype_name', $payment_type)->first();
            $data = [
                'customer_id'=> session()->get('user_id'),
                'order_amount'=> $cart->total(),
                'order_status'=> 'Paid',
                'payment_type'=> $payment_id['paymenttype_id']
            ];
            $order->save($data);
            $order_id = (int)$order->insertID();
            $items = $cart->contents();
            $moredata = [];
            foreach($items as $item){
                $moredata = [
                    'order_id'          =>        $order_id,
                    'product_id'        =>        $item['id'],
                    'product_price'     =>        $item['price'],
                    'order_quantity'    =>         $item['qty'],
                    'orderdetails_total'=>       $item['subtotal']
                ];
                $orderdetails->save($moredata);
            }
            
    }
}

