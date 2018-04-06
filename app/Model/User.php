<?php 
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
//tambien podemos encriptar con blowfish
class User extends AppModel {

	public function beforeSave($options=array()) {
		if(!empty($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}

	public function getConfig()
    {
        return array(
            "login" => '6dd490faf9cb87a9862245da41170ff2',
            "tran_key" => '024h1IlD',
            "cache" => array(
                "type" => "apcu",
                "memcached" => array(
                    "host" => "192.168.1.87",
                    "port" => "3030"
                )
            )
        );
    }	
}

?>