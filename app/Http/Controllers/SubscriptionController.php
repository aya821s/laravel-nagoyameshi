<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();

        return view('subscription.create', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $stripeCustomer = $user->createAsStripeCustomer();
        $user->updateDefaultPaymentMethod($request->payment_method);
        return to_route('mypage')->with('flash_message', '有料プランへの登録が完了しました。');
}

public function edit(Request $request)
    {
        $user = Auth::user();

        return view('subscription.edit', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function cancel(Request $request)
    {
        $user = Auth::user();

        return view('subscription.cancel', [
            'intent' => $user->createSetupIntent()
        ]);
    }
}