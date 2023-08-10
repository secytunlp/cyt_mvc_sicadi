<?php

/**
 * UnidadAprobada
 *
 * @author Marcos
 * @since 29-05-2014
 */

class UnidadAprobada extends Entity{

	//variables de instancia.
	

	
	private $unidad;
	
	private $periodo;
	
	
	
	
	


	public function __construct(){
		 
		$this->unidad = new LugarTrabajo();
		
		$this->periodo = new Periodo();
		
	}



	public function getUnidad()
	{
	    return $this->unidad;
	}

	public function setUnidad($unidad)
	{
	    $this->unidad = $unidad;
	}

	public function getPeriodo()
	{
	    return $this->periodo;
	}

	public function setPeriodo($periodo)
	{
	    $this->periodo = $periodo;
	}
}
?>