<?php

/**
 * DenySolicitud
 *
 * @author Marcos
 * @since 21-03-2014
 */

class DenySolicitud extends Entity{

	//variables de instancia.
	
	

	private $solicitud;
	
	private $observaciones;
	

	public function __construct(){
		
		$this->solicitud = new Solicitud();
		
		$this->observaciones = "";
		
	}



	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
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