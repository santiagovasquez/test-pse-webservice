<?php
namespace PlaceToPay\SDKPSE\Structures;


class CreditConcept
{
	/**
	 * $entityCode 	Codigo de la entidad del tercero para dispersion 
	 * @var string
	 */
    public $entityCode;
    
    /**
	 * $serviceCode 	Codigo del servicio del tercero
	 * @var string
	 */
    public $serviceCode;

	/**
	 * $amountValue	Valor total a recaudar a favor de la entidad
	 * @var float
	 */
    public $amountValue;

    /**
	 * $taxValue	Discriminacion del impuesto aplicado a favor de la entidad
	 * @var float
	 */
    public $taxValue;  

    /**
	 * $description 	Descripcion el concepto cobrado
	 * @var string
	 */
    public $description;
}
