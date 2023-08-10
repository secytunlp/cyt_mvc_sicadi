<?php

/**
 * Rendicion
 *
 * @author Marcos
 * @since 04-03-2016
 */

class Rendicion extends Entity{

	//variables de instancia.
	
	private $ds_investigador;
	private $nu_cuil;

	private $estado;
	
	private $solicitud;
	
	private $rendicion;
	private $informe;
	private $constancia;
	
	  private $fecha;
	 
	  
	 
	  private $observaciones;
	  
	  private $motivo_oid;
	  
	
	public function __construct(){
		 
			$this->ds_investigador = '';
		   
		   $this->nu_cuil = '';
		
		  $this->solicitud = new Solicitud();
		  
		 
		  
		   $this->rendicion = '';
		   $this->informe = '';
		   $this->constancia = '';
		   
		  
		  $this->fecha = '';
		  
		  
		  
		  $this->observaciones = '';
		  
	}




	

    
	public function __toString(){
		
		return $this->getDs_investigador();
	}

	

	

	public function getDs_investigador()
	{
	    return $this->ds_investigador;
	}

	public function setDs_investigador($ds_investigador)
	{
	    $this->ds_investigador = $ds_investigador;
	}

	public function getNu_cuil()
	{
	    return $this->nu_cuil;
	}

	public function setNu_cuil($nu_cuil)
	{
	    $this->nu_cuil = $nu_cuil;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getSolicitud()
	{
	    return $this->solicitud;
	}

	public function setSolicitud($solicitud)
	{
	    $this->solicitud = $solicitud;
	}

	public function getRendicion()
	{
	    return $this->rendicion;
	}

	public function setRendicion($rendicion)
	{
	    $this->rendicion = $rendicion;
	}

	public function getInforme()
	{
	    return $this->informe;
	}

	public function setInforme($informe)
	{
	    $this->informe = $informe;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}

	public function getConstancia()
	{
	    return $this->constancia;
	}

	public function setConstancia($constancia)
	{
	    $this->constancia = $constancia;
	}

	public function getMotivo_oid()
	{
	    return $this->motivo_oid;
	}

	public function setMotivo_oid($motivo_oid)
	{
	    $this->motivo_oid = $motivo_oid;
	}
}
?>