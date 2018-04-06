<?php
namespace PlaceToPay\SDKPSE\Structures;

/**
 * Clase que representa una solicitud de transaccion con debitos a cuenta PSE.
 */
class PSETransactionRequest
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
}
