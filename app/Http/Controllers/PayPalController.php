<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\BookingInvoice;

class PayPalController extends Controller
{
    protected $service;

    public function __construct() {
        $this->service = new ExpressCheckout();
    }

    public function index() {
        return view('payment');
    }

    public function checkout() {

        $id = BookingInvoice::count() + 1;
        $cart = $this->getCart($id);

        $invoice = new BookingInvoice();
        $invoice->name = $cart['invoice_description'];
        $invoice->price = $cart['total'];
        $invoice->save();

        $response = $this->service->setExpressCheckout($cart, false);

        if(!$response['paypal_link']) {
            return redirect('/paypal/test')
                ->with(['msg' => 'Es gibt Probleme mit Paypal']);
        }

        return redirect($response['paypal_link']);
    }

    private function getCart($id) {

        return [
            'items' => [
                [
                    'name' => 'Buchung eines Porsches 911',
                    'price' => 125,
                    'qty' => 1
                ]
            ],
            'invoice_id' => $id,
            'invoice_description' => 'Invoice Nr'.$id,
            'cancel_url' => url('/paypal/test'),
            'total' => 125,
            'return_url' => url('/paypal/checkout-success')
        ];
    }


    public function checkoutSuccess(Request $request) {
        
        $token = $request->get('token');
        $payerId = $request->get('PayerID');

        $response = $this->service->getExpressCheckoutDetails($token);

        if(!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/paypal/test')
                ->with(['msg' => 'Es gibt Probleme mit Paypal']);
        }

        $invoice = \App\BookingInvoice::find($response['INVNUM']);
        $invoice->status = 'Bezahlt';
        $invoice->save();

        return redirect('/paypal/test')
            ->with(['msg' => 'Zahlung war erfolgreich']);

    }

    public function notify() {
        
    }
}
