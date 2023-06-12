<?php

namespace App\Http\Controllers;

use App\Models\Inversion;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\Gateway;
use Omnipay\Paypal\RestGateway;
use App\Models\Payment;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Auth;
use Omnipay\Common\Exception\InvalidRequestException;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create(('Paypal_Rest'));
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET_ID'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success?usuario=' . $request->usuario . '&pelicula=' . $request->pelicula),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        $usuario = $request->input('usuario');
        $pelicula = $request->input('pelicula');
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                $inversion = new Inversion();
                $inversion->cantidad = $arr['transactions'][0]['amount']['total'];
                $inversion->id_pago = $arr['id'];
                $inversion->user_id = $usuario;
                $inversion->pelicula_id = $pelicula;

                $inversion->save();

                $pelicula = Pelicula::find($pelicula);
                if ($pelicula) {
                    $pelicula->cantidad += $inversion->cantidad;
                    $pelicula->save();
                }

                return redirect()->route('factura', ['pelicula' => $pelicula->id, 'inversion' => $inversion->id, 'payment' => $payment->id]);
            } else {
                return $response->getMessage();
            }
        } else {
            return "Payment denied";
        }
    }

    public function factura(Pelicula $pelicula, Inversion $inversion, Payment $payment) {
        if (Auth::user()->rol == 'admin') {
            return view('admin.factura', compact('pelicula', 'inversion', 'payment'));
        } else {
            return view('web.factura', compact('pelicula', 'inversion', 'payment'));
        }
    }
    

    public function error()
    {
        return "User declined payment";
    }
}
