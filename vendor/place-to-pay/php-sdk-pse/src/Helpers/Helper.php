<?php
namespace PlaceToPay\SDKPSE\Helpers;

class Helper
{

    public static function path()
    {
    	return substr(__DIR__, 0, -11);
    }

    /**
     * seed Semilla para el consumo del webservice
     * 
     * @return String Semilla
     */
    public static function seed()
    {
    	return date('c');
    }

    /**
     * tranKey Llave transaccional para el consumo del webservice
     * 
     * @param  String $seed    Semilla para la autenticacion del webservice
     * @param  String $tranKey Llave originalmente enviado por PlacetoPay
     * @return String          Llave transaccional
     */
    public static function tranKey($seed, $tranKey)
    {
    	return sha1($seed . $tranKey,false);
    }
}
