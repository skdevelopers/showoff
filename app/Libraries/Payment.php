<?php

namespace App\Libraries;

use DateTime;
use DateTimeZone;

class Payment {
  function initPayment($user_id,$invoice_id,$amount_to_pay,$booking_type)
  {
    $user = \App\Models\User::where(['id'=>$user_id])->get()->first();
    $response=array();
    $data['client_reference_id']=$invoice_id;
    $data['product'] = env('APP_NAME');
    $data['description'] = "Game payment";
    $data['quantity'] = 1;
    $data['image'] = asset('/web_assets/images/logo-talents.png');
    $data['success_url'] = url('/').'/payment-response/?sessio_id={CHECKOUT_SESSION_ID}&token='.$invoice_id;
    $data['cancel_url'] = url('/').'/client_cancel?sessio_id={CHECKOUT_SESSION_ID}&token={$payment_token}';
    $data['amount'] = $amount_to_pay * 100;
    $data['email'] = $user->email??env('MAIL_USERNAME');

    \Stripe\Stripe::setApiKey(config('app.STRIPE_SECRET'));
        $checkout_session =  \Stripe\PaymentIntent::create([
            'amount' => $amount_to_pay*100,
            'currency' => 'AED',
            'description' => "game purchase",
            'shipping' => [
                'name' =>$user->name,
                'address' => [
                    'line1' => 'Dubai',
                    'postal_code' => 12345,
                    'city' => 'Dubai',
                    'state' => 'Dubai',
                    'country' => 'United Arab Emirates',
                ],
            ]
        ]);

        $data['session_id'] = $checkout_session->id;
        $ref= $checkout_session->id;


        $PaymentInit = new \App\Models\PaymentInit();
        $PaymentInit->total_amount           = $amount_to_pay;
        $PaymentInit->transaction_id         = $checkout_session->id;
        $PaymentInit->invoice_id             = $invoice_id;
        $PaymentInit->transaction_details    = $checkout_session->client_secret;
        $PaymentInit->payment_status         = 0;
        $PaymentInit->user_id                = $user_id;

        $PaymentInit->booking_type           = $booking_type;
        $PaymentInit->created_at             = gmdate('Y-m-d H:i:00');
        $PaymentInit->updated_at             = gmdate('Y-m-d H:i:00');

        $invoice_id  = 0;
        $payment_ref = 0;

        if($PaymentInit->save())
        {
            $invoice_id  = $PaymentInit->id;
            $payment_ref = $checkout_session->client_secret;
        }

        return compact('invoice_id','payment_ref');
  }
}
