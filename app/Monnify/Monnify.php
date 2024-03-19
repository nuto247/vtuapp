<?php

namespace Monnify;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Monnify\Exceptions\MonnifyHttpException;

class Monnify
{
    protected $apiKey;
    protected $contractCode;
    protected $baseUrl;
    protected $sandbox;

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->apiKey = $config['apiKey'];
        $this->contractCode = $config['contractCode'];
        $this->baseUrl = $config['baseUrl'];
        $this->sandbox = $config['sandbox'];
    }

    /**
     * Initialize transaction.
     *
     * @param array $payload
     * @return array
     * @throws MonnifyHttpException
     */
    public function initializeTransaction(array $payload): array
    {
        try {
            $client = new Client();

            $response = $client->post($this->baseUrl . '/api/v1/merchant/transactions/init-transaction', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'amount' => $payload['amount'],
                    'paymentReference' => $payload['paymentReference'],
                    'currencyCode' => $payload['currencyCode'],
                    'customerName' => $payload['customerName'],
                    'customerEmail' => $payload['customerEmail'],
                    'paymentDescription' => $payload['paymentDescription'],
                    'redirectUrl' => $payload['redirectUrl'],
                    'contractCode' => $this->contractCode,
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            throw new MonnifyHttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
