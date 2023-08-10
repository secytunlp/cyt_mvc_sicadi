<?php

/**
 * Evaluadores
 *
 * @author Marcos
 * @since 13-05-2014
 */

class Evaluadores extends Entity{

	//variables de instancia.
	
	private $solicitud;
	
	private $evaluadorInterno;
	
	private $evaluadorExterno;
	
	private $evaluadorTercero;
	
	private $error;

	public function __construct(){
		 
		$this->solicitud = new Solicitud();
		
		$this->evaluadorInterno = new User();
		
		$this->evaluadorExterno = new User();
		
		$this->evaluadorTercero = new User();
		
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

	public function getEvaluadorInterno()
	{
	    return $this->evaluadorInterno;
	}

	public function setEvaluadorInterno($evaluadorInterno)
	{
	    $this->evaluadorInterno = $evaluadorInterno;
	}

	public function getEvaluadorExterno()
	{
	    return $this->evaluadorExterno;
	}

	public function setEvaluadorExterno($evaluadorExterno)
	{
	    $this->evaluadorExterno = $evaluadorExterno;
	}

	public function getEvaluadorTercero()
	{
	    return $this->evaluadorTercero;
	}

	public function setEvaluadorTercero($evaluadorTercero)
	{
	    $this->evaluadorTercero = $evaluadorTercero;
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