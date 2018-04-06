<?php
namespace PlaceToPay\SDKPSE;

use \SoapClient;
use PlaceToPay\SDKPSE\Helpers\Helper;
use PlaceToPay\SDKPSE\Helpers\Validate;
use PlaceToPay\SDKPSE\Cache\Cache;
use PlaceToPay\SDKPSE\Filter;
use PlaceToPay\SDKPSE\Structures\Authentication;
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Helpers'. DS . 'Helper.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Helpers'. DS . 'Validate.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Structures'. DS . 'Authentication.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Cache'. DS . 'Cache.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Filter.php' );


class SDKPSE
{
	/**
	 * $WSDL Contiene la url del webservice
	 * @var string
	 */
	private static $WSDL = 'https://test.placetopay.com/soap/pse/?wsdl';

	private static $ENCODING = 'UTF-8';

	private $soapClient;

	private $config;


	function __construct($config)
	{
		$this->config = $config;
		$this->soapClient = 
			new SoapClient(self::$WSDL,array("encoding"=>"UTF-8",'trace' => 1,'exceptions' => true));
		$this->soapClient->__setLocation('https://test.placetopay.com/soap/pse/');
			

	}


	public function getBankList()
	{
		//
		# tiempo de expiracion para cachear los bancos
		$expiration = 86400; // 1 dia
		# key asignado para cachear los bancos
		$keyCache = 'bank_list';
		# Obtener la lista de bancos que estan en la cache
		$cache = new Cache($this->config['cache']);
		$banks = $cache->get($keyCache);
		if ($banks === false) {
			try {
				# Consumir el servicio para obtener las bancos
				$result = $this->soapClient->getBankList($this->auth());
				$banks = $result->getBankListResult->item;
				
	            $cache->add($keyCache, $banks, $expiration);
	        } catch (SoapFault $e) {
				var_dump($e->getMessage());
	        }
		}

        return is_array($banks) ? $banks : false;
	}


	public function createTransaction($transaction)
	{
        # Validar los parametros
        Validate::make($transaction, Filter::PSETransactionRequest());
        Validate::make($transaction->payer, Filter::Person());
        Validate::make($transaction->buyer, Filter::Person());
        Validate::make($transaction->shipping, Filter::Person());

		$param = $this->auth();
		$param['transaction'] = $transaction;

		try {
	        $result = $this->soapClient->createTransaction($param);
	        $transaction = $result->createTransactionResult;
	    } catch (Exception $e) {
	    	Error::newException(
	    		'Error al crear la transaccion'
	    	);
	    }

	    return is_object($transaction) ? $transaction : false;
	}


	public function createTransactionMultiCredit($transaction)
	{
        # Validar los parametros
        Validate::make($transaction, Filter::PSETransactionRequest());
        Validate::make($transaction->payer, Filter::Person());
        Validate::make($transaction->buyer, Filter::Person());
        Validate::make($transaction->shipping, Filter::Person());
        Validate::make($transaction->credits, Filter::CreditConcept());

		$param = $this->auth();
		$param['transaction'] = $transaction;

		try {
	        $result = $this->soapClient->createTransactionMultiCredit($param);
	        $transaction = $result->createTransactionMultiCreditResult;
	    } catch (Exception $e) {
	    	Error::newException(
	    		'Error al crear transaccion con dispersion de fondos'
	    	);
	    }

	    return is_object($transaction) ? $transaction : false;
	}
	

	public function getTransactionInformation($transactionID)
	{
		if (intval($transactionID) == 0)
			Error::newException('Invalido el $transactionID ');

		$param = $this->auth();
		$param['transactionID'] = $transactionID;
		$informacion = '';

		try {
	        $result = $this->soapClient->getTransactionInformation($param);
	        $informacion = $result->getTransactionInformationResult;
	    } catch (Exception $e) {
	    	Error::newException(
	    		'Error al obtener la informacion de la transaccion'
	    	);
	}

        return is_object($informacion) ? $informacion : false;
	}



	private function auth()
	{
		$seed = Helper::seed();
		$tranKey = Helper::tranKey($seed, $this->config['tran_key']);
		
		$authentication = new Authentication;
		$authentication->login = $this->config['login'];
		$authentication->tranKey = $tranKey;
		$authentication->seed = $seed;
		$authentication->additional = array();
		return array('auth' => $authentication);
	}
}