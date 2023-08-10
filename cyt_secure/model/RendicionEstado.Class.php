<?php

/**
 * RendicionEstado
 *
 * @author Marcos
 * @since 04-03-2016
 */

class RendicionEstado extends Entity{

	//variables de instancia.
	
	private $rendicion;
	
	

	private $estado;
	
	
	
	private $fechaDesde;
	
	private $fechaHasta;
	
	private $motivo;
	
	
	
	private $user;
	private $fechaUltModificacion;
	
	


	public function __construct(){
		 
		$this->rendicion = new Rendicion();
		
		$this->user = new User();
		
		$this->estado = new Estado();
		
		
			
		$this->fechaDesde = "";
		
		$this->fechaHasta = "";
		
		$this->motivo = "";
		
		
		
		$this->fechaUltModificacion = "";
	}




	

	 

	

	

	public function getRendicion()
	{
	    return $this->rendicion;
	}

	public function setRendicion($rendicion)
	{
	    $this->rendicion = $rendicion;
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


}
?>