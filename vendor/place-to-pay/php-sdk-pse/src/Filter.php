<?php
namespace PlaceToPay\SDKPSE;


class Filter
{

	public static function Person()
	{
		return array(
            'document' => 'max:12',
            'documentType' => 'max:3|containt:CC,CE,TI,PPN,NIT,SSN',
            'firstName' => 'max:60',
            'lastName' => 'max:60',
            'company' => 'max:60',
            'emailAddress' => 'max:80|email',
            'address' => 'max:100',
            'city' => 'max:50',
            'province' => 'max:50',
            'country' => 'max:2',
            'phone' => 'max:30',
            'mobile' => 'max:30'
        );
	}


	public static function PSETransactionRequest()
	{
		return array(
            'bankCode' => 'max:4',
            'bankInterface' => 'max:1|containt:0,1',
            'returnURL' => 'max:255',
            'reference' => 'max:32',
            'description' => 'max:255',
            'language' => 'max:2',
            'currency' => 'max:3',
            'ipAddress' => 'ip',
            'userAgent' => 'max:255'
        );
	}


	public static function PSETransactionMultiCreditRequest()
	{
		return array(
            'bankCode' => 'max:4',
            'bankInterface' => 'max:1|containt:0,1',
            'returnURL' => 'max:255',
            'reference' => 'max:32',
            'description' => 'max:255',
            'language' => 'max:2',
            'currency' => 'max:3',
            'ipAddress' => 'ip',
            'userAgent' => 'max:255'
        );
	}


	public static function CreditConcept()
	{
		return array(
            'entityCode' => 'max:12',
            'serviceCode' => 'max:12',
            'description' => 'max:60'
        );
	}
}