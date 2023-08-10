<?php

/**
 * Evaluador
 *
 * @author Marcos
 * @since 09-04-2018
 */

class Evaluador extends Entity{

	//variables de instancia.
	
	private $solicitud;
	
	private $evaluador;
	
	private $bl_interno;
	
	
	
	private $error;

	public function __construct(){
		 
		$this->solicitud = new Solicitud();
		
		$this->evaluador = new User();
		
		$this->bl_interno=0;
		
		$this->error = '';
	}

	

	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
	}

	public function getEvaluador()
	{
	    return $this->evaluador;
	}

	public function setEvaluador($evaluador)
	{
	    $this->evaluador = $evaluador;
	}

	public function getBl_interno()
	{
	    return $this->bl_interno;
	}

	public function setBl_interno($bl_interno)
	{
	    $this->bl_interno = $bl_interno;
	}

	public function getError()
	{
	    return $this->error;
	}

	public function setError($error)
	{
	    $this->error = $error;
	}
}
?>