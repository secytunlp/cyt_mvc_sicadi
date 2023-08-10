<?php

/**
 * Titulo
 *
 * @author Marcos
 * @since 12-12-2013
 */

class Titulo extends Entity{

	//variables de instancia.
	
	
	
	private $nu_nivel;
	
	private $ds_titulo;
	
	private $universidad;
	
	
	
	
	


	public function __construct(){
		 
		
		
		$this->nu_nivel = "";
		
		$this->ds_titulo = "";
		
		$this->universidad = new Universidad();
		
		
		
		
	}




	

	 

	

	

	public function getNu_nivel()
	{
	    return $this->nu_nivel;
	}

	public function setNu_nivel($nu_nivel)
	{
	    $this->nu_nivel = $nu_nivel;
	}

	public function getDs_titulo()
	{
	    return $this->ds_titulo;
	}

	public function setDs_titulo($ds_titulo)
	{
	   
		$this->ds_titulo = $ds_titulo;
	}

	

	

	public function getUniversidad()
	{
	    return $this->universidad;
	}

	public function setUniversidad($universidad)
	{
	    $this->universidad = $universidad;
	}
	
	public function __toString(){
		
		return $this->getDs_titulo();
	}
}
?>