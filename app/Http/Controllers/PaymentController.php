<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree;
use Illuminate\Support\Facades\Log; // Aggiunto l'import per la classe Log

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        return view('payment_form');
    }

    public function getClientToken()
    {
        try {
            $gateway = new Braintree\Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchant_id'),
                'publicKey' => config('services.braintree.public_key'),
                'privateKey' => config('services.braintree.private_key')
            ]);

            $clientToken = $gateway->clientToken()->generate();

            return response()->json(['clientToken' => $clientToken]);
        } catch (\Exception $e) {
            // Log dell'errore
            Log::error('Errore durante il recupero del token di autorizzazione: ' . $e->getMessage());
            // Restituisci una risposta di errore
            return response()->json(['error' => 'Errore durante il recupero del token di autorizzazione'], 500);
        }
    }

    public function showPaymentForm($sponsorshipId)
    {
        try {
            $sponsorship = Sponsorship::findOrFail($sponsorshipId);
            return view('payment_form', compact('sponsorship'));
        } catch (\Exception $e) {
            // Log dell'errore
            Log::error('Errore durante il recupero della sponsorizzazione: ' . $e->getMessage());
            // Restituisci una risposta di errore
            return back()->with('error', 'Errore durante il recupero della sponsorizzazione');
        }
    }

    public function processPayment(Request $request)
    {
        try {
            $paymentData = $request->only(['amount', 'payment_method_nonce', 'description']);

            $gateway = new Braintree\Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchant_id'),
                'publicKey' => config('services.braintree.public_key'),
                'privateKey' => config('services.braintree.private_key')
            ]);

            $result = $gateway->transaction()->sale([
                'amount' => $paymentData['amount'],
                'paymentMethodNonce' => $paymentData['payment_method_nonce'],
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {
                // Transazione autorizzata, procedi con il reindirizzamento alla pagina di conferma
                return redirect()->route('operator-sponsorships.create')->with('payment_success', true);
            } else {
                // Transazione non autorizzata, restituisci l'errore
                $errorMessages = $result->errors->deepAll();
                Log::error('Errore durante il pagamento: ' . $errorMessages[0]->message);
                return back()->with('error', 'Errore durante il pagamento: ' . $errorMessages[0]->message);
            }
        } catch (\Exception $e) {
            // Log dell'errore
            Log::error('Errore durante il pagamento: ' . $e->getMessage());
            // Restituisci una risposta di errore
            return back()->with('error', 'Errore durante il pagamento');
        }
    }
}