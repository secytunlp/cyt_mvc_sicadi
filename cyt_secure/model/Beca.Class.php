<?php

/**
 * Beca
 *
 * @author Marcos
 * @since 18-12-2013
 */

class Beca extends Entity{

	//variables de instancia.

	
	
	private $docente;
	  
	
	
	private $bl_unlp;
	  
	private $ds_tipobeca; 
	
	private $dt_desde;
	
	private $dt_hasta;
	
	private $ds_resumen;
	
	
	 
	
	public function __construct(){
		 
		
		
		$this->docente = new Docente();
		  
		
		
		$this->bl_unlp = "";
		  
		$this->ds_tipobeca = ""; 
		
		$this->dt_desde = "";
		
		$this->dt_hasta = "";
		
		
		
	}




	

	

	

	public function getDocente()
	{
	    return $this->docente;
	}

	public function setDocente($docente)
	{
	    $this->docente = $docente;
	}

	public function getBl_unlp()
	{
	    return $this->bl_unlp;
	}

	public function setBl_unlp($bl_unlp)
	{
	    $this->bl_unlp = $bl_unlp;
	}

	public function getDs_tipobeca()
	{
	    return $this->ds_tipobeca;
	}

	public function setDs_tipobeca($ds_tipobeca)
	{
	    $this->ds_tipobeca = $ds_tipobeca;
	}

	public function getDt_desde()
	{
	    return $this->dt_desde;
	}

	public function setDt_desde($dt_desde)
	{
	    $this->dt_desde = $dt_desde;
	}

	public function getDt_hasta()
	{
	    return $this->dt_hasta;
	}

	public function setDt_hasta($dt_hasta)
	{
	    $this->dt_hasta = $dt_hasta;
	}

	public function getDs_resumen()
	{
	    return $this->ds_resumen;
	}

	public function setDs_resumen($ds_resumen)
	{
	    $this->ds_resumen = $ds_resumen;
	}
}
?>