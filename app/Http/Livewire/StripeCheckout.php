<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Stripe;

class StripeCheckout extends Component
{
    public function stripePost()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => "654156uhu",
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
    public function render()
    {
        return view('livewire.stripe-checkout');
    }
}
