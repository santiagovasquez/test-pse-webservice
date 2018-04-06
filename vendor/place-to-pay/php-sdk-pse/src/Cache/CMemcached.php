<?php
namespace PlaceToPay\SDKPSE\Cache;

use \Memcached;
use PlaceToPay\SDKPSE\Helpers\Error;

class CMemcached implements CInterface
{
	/**
	 * $memcached Contiene la instancia de \Memcached
	 * @var \Memcached 
	 */
	private $memcached;

    /**
     * __construct 
     * @param array $config configuracion del servidor, los indices deben ser:
     *                      [
	 *                     	   "host" => "Host del servidor",
	 *                     	   "port" => "puerto del servidor"
     *                      ]
     */
    public function __construct($config)
    {
        $this->memcached  = new Memcached();
		$result = $this->memcached->addServer(
			$config['host'],
			$config['port']
		);

		if ($result === false) {
			Error::newException(
				'Error al adicionar el servidor de \\Memcached'
			);
		}
    }

    /**
	 * add Adicionar un item a una nueva clave
	 * 
	 * @param string $key 		La clave en la que se guardará el valor
	 * @param mixed $value 		El valor a guardar
	 * @param int $expiration 	Tiempo de expiracion en segundos
	 * @return boolean 			true si se adiciono correctamente o 
	 *                         	false en caso contrario
	 */
	public function add($key, $value, $expiration)
	{
		return $this->memcached->add($key, $value, $expiration);
	}

	/**
	 * get Obtener un item
	 * 
	 * @param string $key 	La clave del item a obtener
	 * @return mixed 		Devuelve el valor obtenido o 
	 *                      false si el item no existe
	 */
	public function get($key)
	{
		return $this->memcached->get($key);
	}

	/**
	 * delete Elimina un item
	 * 
	 * @param string $key 	La clave del item a eliminar
	 * @return boolean 		Devuelve true si se adiciono correctamente o
	 *                      false en caso contrario
	 */
	public function delete($key)
	{
		return $this->memcached->delete($key);
	}
}
