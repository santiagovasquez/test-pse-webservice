<?php
namespace PlaceToPay\SDKPSE\Cache;
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Cache'. DS . 'CInterface.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Cache'. DS . 'CAPCU.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Helpers'. DS . 'Helper.php' );
use PlaceToPay\SDKPSE\Helpers\Error;

/**
 * Clase que provee metodos para manipular los datos de la cache
 *
 * El servidor de cache que se utiliza se encuentra configurado
 * en el atributo "type" del array solicitado en el constructur de la calse
 * 
 * Genera una excepcion cuando no se envia por parametro al intancias
 * la clase el tipo de cache a utilizar
 */
class Cache implements CInterface
{

	private $objServer;

    public function __construct($cache)
    {	
    	$type = strtoupper($cache['type']);
        switch ($type) {
        	case 'MEMCACHED':
        		$this->objServer = new CMemcached($cache['memcached']);
        		break;
        	case 'APCU':
				$this->objServer = new CAPCU;
        		break;
			default:
				echo('Error debe configurar el tipo cache');
        		break;
        }
    }


    public function add($key, $value, $expiration)
	{
		return $this->objServer->add(
			$key,
			json_encode($value),
			$expiration
		);
	}


	public function get($key) //$key = bank list
	{
		$data = $this->objServer->get($key); 
		
		return $data === false ? false : json_decode($data);
	}


	public function delete($key)
	{
		return $this->objServer->delete($key);
	}
}