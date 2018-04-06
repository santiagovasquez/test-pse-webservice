<?php
namespace PlaceToPay\SDKPSE\Helpers;

class Validate 
{	   

    public static function make($data, $filter)
    {
    	if (is_array($data)) {
    		foreach ($data as $value) {
    			self::applyFilter($value, $filter);
    		}
    	} else {
    		self::applyFilter($data, $filter);
    	}
    }

    private static function applyFilter($obj, $filter)
    {
    	foreach ($filter as $key => $value) {
    		self::inAttr($obj, $key);
    		$valueAttr = $obj->$key;

    		$validate = array_map('trim',explode('|', $value));

    		foreach ($validate as $row) {
    			$param = explode(':', $row);

    			$result = false;
    			switch ($param[0]) {
    				case 'containt':
    					$result = self::containt($valueAttr, $param[1]);
    					break;
    				case 'email':
    					$result = self::email($valueAttr);
    					break;
    				case 'ip':
    					$result = self::ip($valueAttr);
    					break;
    				case 'max':
    					$result = self::max($valueAttr, $param[1]);
    					break;
    				default:
    					Error::newException(
    						"No existe el filtro ({$param[0]})"
    					);
    					break;
    			}

    			if ($result == false) {
					Error::newException(
						"El atributo ($key) no cumple con el filtro ($row)"
					);
    			}
    		}
    	}
    }


    private static function inAttr($obj, $attr)
    {
    	if (! isset($obj->$attr)) {
			Error::newException("No existe el atributo ($attr) en el objeto");
		}
    }


    private static function containt($value, $data)
    {
    	$data = explode(',', $data);
    	return in_array($value, $data);
    }


    private static function email($value)
    {
    	return filter_var($value, FILTER_VALIDATE_EMAIL) == false
    		? false
    		: true;
    }


    private static function ip($value)
    {
    	return filter_var($value, FILTER_VALIDATE_IP) == false
    		? false
    		: true;
    }


    private static function max($value, $len)
    {
    	return strlen("$value") <= $len;
    }



}

