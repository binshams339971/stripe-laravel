<?php

namespace App\Http\Controllers;

use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        $YOUR_DOMAIN = 'http://127.0.0.1:8000/';
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Consultation Fee',
                    ],
                    'unit_amount' => 1000
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . 'success',
            'cancel_url' => $YOUR_DOMAIN . 'cancel',
        ]);
        return Redirect($checkout_session->url);
        //return $checkout_session;
    }

    public function success()
    {
        echo 'Payment Has been Received';
    }
    public function cancel()
    {
        echo 'Payment Has been cancelled';
    }
    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
