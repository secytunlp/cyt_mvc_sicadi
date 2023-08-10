<?php

/**
 * EvaluacionEstado
 *
 * @author Marcos
 * @since 03-12-2013
 */

class EvaluacionEstado extends Entity{

	//variables de instancia.
	
	private $evaluacion;
	
	private $user;

	private $estado;
	
	
	
	private $fechaDesde;
	
	private $fechaHasta;
	
	private $motivo;
	
	
	
	private $userMod;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->evaluacion = new Evaluacion();
		
		$this->user = new User();
		
		$this->estado = new Estado();
		
		
			
		$this->fechaDesde = "";
		
		$this->fechaHasta = "";
		
		$this->motivo = "";
		
		
		
		$this->userMod = new User();
		
		$this->fechaUltModificacion = "";
	}




	

	 

	

	

	public function getEvaluacion()
	{
	    return $this->evaluacion;
	}

	public function setEvaluacion($evaluacion)
	{
	    $this->evaluacion = $evaluacion;
	}

	

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}

	public function getMotivo()
	{
	    return $this->motivo;
	}

	public function setMotivo($motivo)
	{
	    $this->motivo = $motivo;
	}

	
	public function getFechaUltModificacion()
	{
	    return $this->fechaUltModificacion;
	}

	public function setFechaUltModificacion($fechaUltModificacion)
	{
	    $this->fechaUltModificacion = $fechaUltModificacion;
	}

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getUserMod()
	{
	    return $this->userMod;
	}

	public function setUserMod($userMod)
	{
	    $this->userMod = $userMod;
	}
}
?>