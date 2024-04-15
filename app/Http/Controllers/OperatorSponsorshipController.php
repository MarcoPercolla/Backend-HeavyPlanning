<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatorSponsorshipRequest;
use App\Models\Operator;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Braintree\ClientToken;
use Braintree\Transaction;

class OperatorSponsorshipController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key')
        ]);
    }

    public function create($operator_id)
    {
        $sponsorships = Sponsorship::all();
        $clientToken = $this->generateClientToken();
        return view("admin.operators.operatorSponsorship", compact("operator_id", "sponsorships", "clientToken"));
    }

    public function store(StoreOperatorSponsorshipRequest $request, $operator_id)
    {
        // Process sponsorship form data

        $nonce = $request->payment_method_nonce;
        $amount = 1000.00; // Example amount, you need to adjust this according to your logic

        // Make payment with Braintree
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Check payment result
        if ($result->success) {
            // Payment success, process sponsorship
            $data = $request->all();
            $newOperator = Operator::find($operator_id);
            if ($data["sponsorship"] != 0) {
                date_default_timezone_set("Europe/Rome");
                $date = date("Y-m-d H:i:s");
                $sponsorship = Sponsorship::find($data["sponsorship"]);
                $duration = $sponsorship->duration;
                $object_date = date_create($date);
                $result = date_add($object_date, date_interval_create_from_date_string($duration));
                $newOperator->sponsorships()->attach($data["sponsorship"], [
                    "start_date" => $date,
                    "end_date" => $result
                ]);
            }
            return redirect()->route("admin.operators.show", $operator_id)->with('success', 'Payment successful!');
        } else {
            // Payment failed
            $errors = $result->errors->deepAll();
            return back()->withErrors($errors)->withInput();
        }
    }

    private function generateClientToken()
    {
        try {
            $clientToken = $this->gateway->clientToken()->generate();
            return $clientToken;
        } catch (\Exception $e) {
            // Handle token generation error
            return null;
        }
    }
}
