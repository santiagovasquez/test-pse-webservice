<?php
namespace PlaceToPay\SDKPSE\Structures;


class Authentication
{
	/**
	 * $login Identificador habilitado para el consumo del API, entregado 
	 * por Place to Pay
	 * @var string
	 */
	public $login;
	
    /**
	 * $seed Semilla usada para el consumo del API en el proceso del hash
	 * por SHA1 del tranKey, ISO 8601
	 * @var string
	 */
	public $seed;	
	
	//public $nonce;
    
    /**
	 * $tranKey Llave transaccional para el consumo del API
	 * @var string
	 */
    public $tranKey;

    /**
	 * $additional Datos adicionales a la estructura de autenticacion 
	 * @var array(
	 *      PlaceToPay\SDKPSE\Structures\Attribute
	 *      , ...)
	 */
    public $additional;
}
