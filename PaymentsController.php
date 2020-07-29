<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

use App\Events\ProductPurchased;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');// resources/views/payments/create.blade.php
    }

    public function store()
    {
        // request()->user()->notify(new PaymentReceived());
        Notification::send(request()->user(),new PaymentReceived(900));
    
        //Process the payment
        //unlock the purchase

        ProductPurchased::dispatch('toy');
        // event(new ProductPurchased('toy'))

        //Listeners
        //notify the user about the payment
        //award achievements
        //send shareable coupon to user
    
    }
}
