<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Paypal\Rest\ApiContext;
use Paypal\Auth\OAuthTokenCredential;
use Paypal\Api\Amount;
use Paypal\Api\Details;
use Paypal\Api\Item;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        //setup paypal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function postPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = array();
        $subtotal = 0;
        $cart = \Session::get('cart');
        $currency = 'COP';

        foreach ($cart as $product) {
            $item = new \PayPal\Api\Item();
            $item->setName($product->name)
                ->setCurrency($currency)
                ->setDescription($product->extract)
                ->setQuantity($product->quantity)
                ->setPrice($product->price);

            $items[] = $item;
            $subtotal += $product->quantity * $product->price;
        }
//        dd($items);

        $item_list = new ItemList();
        $item_list->setItems($items);

        $details = new \PayPal\Api\Details();
        $details->setSubtotal($subtotal)
            ->setShipping(100);

        $total = $subtotal + 100;

        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pedido de prueba con Laravel');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
            ->setCancelUrl(\URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions($transaction);
//        dd($payment);
        try {
            $payment->create($this->_api_context);
        } catch (\Paypal\Exception\PayPalConnectionException $exception) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $exception->getMessage() . PHP_EOL;
                $err_data = json_decode($exception->getData(), true);
                exit;
            } else {
                die('Ups! Algo salio mal!');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('cart-show')
            ->with('message', 'Ups! Error desconocido.');
    }

    public function getPaymentStatus()
    {
        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');

        // Clear the session payment ID
        \Session::forget('paypal_payment_id');

        $payerID = \Input::get('PayerID');
        $token = \Input::get('token');

        if (empty($payerID) || empty($token)) {
            return \Redirect::route('home')
                ->with('message', 'Hubo un problema al intentar pagar con paypal.');

            $payment = Payment::get($payment_id, $this->_api_context);

            $execution = new PaymentExecution();
            $execution->setPayerId(\Input::get('PayerID'));

            $result = $payment->execute($execution, $this->_api_context);

            if ($result->getState() == 'approved') {
                return \Redirect::route('home')
                    ->with('message', 'Compra realizada de forma correcta');
            }
            return \Redirect::route('home')
                ->with('message', 'La compra fue cancelada');
        }
    }
}


