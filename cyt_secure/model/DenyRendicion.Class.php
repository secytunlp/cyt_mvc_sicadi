<?php

/**
 * DenyRendicion
 *
 * @author Marcos
 * @since 07-06-2016
 */

class DenyRendicion extends Entity{

	//variables de instancia.
	
	

	private $rendicion;
	
	private $observaciones;
	

	public function __construct(){
		
		$this->rendicion = new Rendicion();
		
		$this->observaciones = "";
		
	}



	public function getRendicion()
	{
	    return $this->rendicion;
	}

	public function setRendicion($rendicion)
	{
	    $this->rendicion = $rendicion;
	}


	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}
}
?>