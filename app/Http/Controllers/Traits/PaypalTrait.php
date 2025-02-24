<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Payment;
use App\PaypalPayment;
use Log;

trait PaypalTrait
{
    /**
     * Access token.
     * 
     * @var string
     */
    private $access_token;

    /**
     * API cLient ID.
     * 
     * @var string
     */
    private $client_id;

    /**
     * API client secret.
     * 
     * @var string
     */
    private $client_secret;

    /**
     * API request URL
     * 
     * @var string
     */
    private $client_endpoint;

    /**
     * Paypal constructor.
     * 
     * @return void
     */
    private function initialize()
    {
        $this->client_id = config('services.paypal.id');      
        $this->client_secret = config('services.paypal.secret');
        $this->client_endpoint = config('services.paypal.endpoint');

        $this->setAccessToken();
    }

    /**
     * Request access token from paypal.
     * 
     * @return void
     */
    private function setAccessToken()
    {
        $curl_handle = curl_init("$this->client_endpoint/v1/oauth2/token");

        # set basic authentication using client ID and client secret
        curl_setopt($curl_handle, CURLOPT_USERPWD, "$this->client_id:$this->client_secret");

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, [

            'Accept: application/json', 'Accept-Language: en_US'
        ]);

        curl_setopt($curl_handle, CURLOPT_POST, true);

        # set POST data in urlencoded format
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, http_build_query(['grant_type' => 'client_credentials']));

        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode( curl_exec($curl_handle) );

        $this->access_token = $response->access_token;
    }

    /**
     * Issue a create-payment request to Paypal
     * 
     * @param  float  $amount
     * @param  string  $type
     * @return \Illuminate\Http\Request
     */
    public function createPayment($amount, $currency, $return_url, $cancel_url)
    {
        #confiqure paypal API
        $this->initialize();

    	# get total by adding commission to amount
    	$total = floor( $amount + round(
        
            ( config('services.paypal.commission.percentage') * $amount / 100 ) + config('services.paypal.commission.extra')
        ));

        $curl_handle = curl_init("$this->client_endpoint/v1/payments/payment");

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, [

            'Content-Type: application/json', "Authorization: Bearer $this->access_token"
        ]);

        curl_setopt($curl_handle, CURLOPT_POST, true);

        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode([
            
            'intent' => 'sale',
            'payer' => array('payment_method' => 'paypal'),
            'redirect_urls' => compact('return_url', 'cancel_url'),
            'transactions' => array([

                'amount' => compact('currency', 'total'),
                'description' => 'Payment to ' . config('app.name') . ' for services rendered',
                'payment_options' => array(

                	'allowed_payment_method' => 'INSTANT_FUNDING_SOURCE'
                )
            ])
        ]));

        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode( curl_exec($curl_handle) );

        try {

            $approval_url = array_reduce($response->links, function ($url, $link) {

                $url .= ($link->rel == 'approval_url') ? $link->href : '';

                return $url;
            });

            return [
                
                'payment_id' => $response->id,
                'approval_url' => $approval_url,
                'status' => $response->state,
                'amount' => floatval($response->transactions[0]->amount->total),
            ];

        } catch (\Throwable $th) {

            Log::error( get_object_vars($response) );
            
            return ['status' => 'failed'];
        }
    }

    /**
     * Execute payment after customer makes approval.
     * 
     * @param  string  $payment_id
     * @param  string  $payer_id
     * @return mixed
     */
    public function executePayment($payment_id, $payer_id)
    {
        #confiqure paypal API
        $this->initialize();
        
        $curl_handle = curl_init("$this->client_endpoint/v1/payments/payment/$payment_id/execute");

        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, [

            'Content-Type: application/json', "Authorization: Bearer $this->access_token"
        ]);

        curl_setopt($curl_handle, CURLOPT_POST, true);

        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode(compact('payer_id')));

        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode( curl_exec($curl_handle) );

        if (@$response->state == 'approved')

            return [

                'status' => $response->state,
                'transaction_id' => $response->transactions[0]->related_resources[0]->sale->id,
                'transaction_fee' => floatval($response->transactions[0]->related_resources[0]->sale->transaction_fee->value)
            ];

        else {

            Log::error("Payment failed: $payment_id");
            Log::error( get_object_vars($response) );

            return ['status' => 'failed'];
        }
    }
}