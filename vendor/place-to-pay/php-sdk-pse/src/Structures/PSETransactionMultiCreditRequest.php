<?php
namespace PlaceToPay\SDKPSE\Structures;


class PSETransactionMultiCreditRequest
{

    public $bankCode;
    public $bankInterface;
    public $returnURL;
    public $reference;  
    public $description;
    public $language;
    public $currency;
    public $totalAmount;
    public $taxAmount;
    public $devolutionBase;
    public $tipAmount;
    public $payer;
    public $buyer;
    public $shipping;
    public $ipAddress;
    public $userAgent;
    public $additionalData;
    public $credits;
}
