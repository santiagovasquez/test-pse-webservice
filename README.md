# test-pse-webservice
Método de conexión a Place to Pay Webservice PSE - ACH Colombia CAKEPHP 2 - PHP 5.6.25

configurar conexion la bd para que cakephp2 corra normal
/app/Config/database.php

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host'       => 'localhost',
		'login'      => 'root',
		'password'   => '',
		'database'   => 'login',
		'prefix'     => '',
		//'encoding' => 'utf8',
	);
	puede apuntar a cualquiera  BD, solo es para que el framework ejecute normalmente.
	
# Santiago vasquez olarte 
	
Requerimientos
Puedes elegir Memcached o APCu para almacenar los datos en caché.
#el proyecto utiliza APCU (asegurese de tener con apcu.dll bien instalado)
