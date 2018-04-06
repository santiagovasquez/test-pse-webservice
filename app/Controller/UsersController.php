<?php 
App::uses('AppController', 'Controller','SoapClient');
use PlaceToPay\SDKPSE\SDKPSE;
use PlaceToPay\SDKPSE\Cache\Cache;
use PlaceToPay\SDKPSE\Structures\Person;
use PlaceToPay\SDKPSE\Structures\PSETransactionRequest;


require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'SDKPSE.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Cache' . DS . 'Cache.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Structures'. DS . 'Person.php' );
require_once(ROOT . DS  . 'vendor' . DS  . 'place-to-pay' . DS . 'php-sdk-pse' . DS . 'src'. DS . 'Structures'. DS . 'PSETransactionRequest.php' );


class UsersController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('createTransaction','login','confirmarCompra');
	}

	public function login() {
        $obj = new SDKPSE($this->User->getConfig());
        $banks = $obj->getBankList();
        $this->set(compact('banks'));       	
    }

    public function confirmarCompra(){
        $this->Session->write('data', $this->request['data']);
        $this->Session->setFlash('Confirmar para completar este proceso',  'flash_success');
        $transaction = new PSETransactionRequest();
        $transaction->reference = '2017-011212';
        $transaction->description = 'Se realiza la compra de un pc';
        $transaction->language = 'ES';
        $transaction->currency = 'COP';
        $transaction->totalAmount = 1500000;
        $this->set(compact('transaction'));          
    }

    public function createTransaction(){
        $obj = new SDKPSE($this->User->getConfig());
        # Obtener el codigo del banco [bankCode]
        $bankCode = '';
        $banks = $obj->getBankList();
        $bankCode = $this->Session->read('data')['bancoSeleccionado']; //banco seleccionado

        $payer = $this->getPersonOne();
        $buyer = $this->getPersonOne();
        $shipping = $this->getPersonTwo();
        
        $transaction = new PSETransactionRequest();
        $transaction->bankCode = $bankCode;
        $transaction->bankInterface = 0;
        $transaction->returnURL = 'http://localhost:3030/test_pse_cake2/users/login';
        $transaction->reference = '2017-011212';
        $transaction->description = 'Se realiza la compra de un pc';
        $transaction->language = 'ES';
        $transaction->currency = 'COP';
        $transaction->totalAmount = 1500000;
        $transaction->taxAmount = 200000;
        $transaction->devolutionBase = 0;
        $transaction->tipAmount = 0;
        $transaction->payer = $payer;
        $transaction->buyer = $buyer;
        $transaction->shipping = $shipping;
        $transaction->ipAddress = '10.10.1.12';
        $transaction->userAgent = 
            'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0)Gecko/20100101 Firefox/50.0';
        $transaction->additionalData = array();

        $result = $obj->createTransaction($transaction);
        # Obtener la informacion de la transaccion
        $info = $obj->getTransactionInformation($result->transactionID);
        if($result->returnCode == "FAIL_NOHOST"){
            $this->Session->setFlash($result->responseReasonText,  'flash_error');
        }
        
        $this->set(compact('result'));
    }
    
    private function getPersonOne()
    {
        $person = new Person;
        $person->document = '1081157823';
        $person->documentType = 'CC';
        $person->firstName = 'Oscar Uriel';
        $person->lastName = 'Rodriguez Tovar';
        $person->company = 'INEFABLE';
        $person->emailAddress = 'okarook@gmail.com';
        $person->address = '41001';
        $person->city = 'NEIVA';
        $person->province = 'HUILA';
        $person->country = 'CO';
        $person->phone = '87108140';
        $person->mobile = '3142891241';

        return $person;
    }

    private function getPersonTwo()
    {
        $person = new Person;
        $person->document = '93090506003';
        $person->documentType = 'TI';
        $person->firstName = 'Leidy ';
        $person->lastName = 'Gonzalez';
        $person->company = 'INEFABLE';
        $person->emailAddress = 'gon@gmail.com';
        $person->address = '41001';
        $person->city = 'NEIVA';
        $person->province = 'Medellin';
        $person->country = 'CO';
        $person->phone = '87108140';
        $person->mobile = '3142901254';

        return $person;
    } 

}

 ?>