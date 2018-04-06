<?php
namespace PlaceToPay\SDKPSE\Helpers;

use \Exception;


class Error
{
    /**
     * newException Lanza una \Exception con el mensaje pasado
     *
     * @param string $message   Mensaje que se muestra en el error
     */
    public static function newException($message)
    {
    	throw new Exception($message);
    }
}
