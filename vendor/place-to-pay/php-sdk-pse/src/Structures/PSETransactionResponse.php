<?php
namespace PlaceToPay\SDKPSE\Structures;


class PSETransactionResponse
{
    public $transactionID;
    public $sessionID;
    public $returnCode;
    public $trazabilityCode;
    public $transactionCycle;
    public $bankCurrency;
    public $bankFactor;
    public $bankURL;
    public $responseCode;
    public $responseReasonCode;
    public $responseReasonText;
}
