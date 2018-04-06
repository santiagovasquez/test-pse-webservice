<?php
namespace PlaceToPay\SDKPSE\Structures;


class TransactionInformation
{
    public $transactionID;
    public $sessionID; 
    public $reference;
    public $requestDate;
    public $bankProcessDate;
    public $onTest;
    public $returnCode;
    public $trazabilityCode;
    public $transactionCycle;
    public $transactionState;
    public $responseCode;
    public $responseReasonCode;
    public $responseReasonText;
}
