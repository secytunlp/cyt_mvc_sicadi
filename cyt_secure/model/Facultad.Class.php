<?php

/**
 * Facultad
 *
 * @author Marcos
 * @since 21-10-2013
 */

class Facultad extends Entity{

	//variables de instancia.
	
	private $nu_codigo;
	
	private $ds_facultad;
	
	private $cat;
	
	public function __construct(){
		 
		
		
		$this->nu_codigo = "";
		
		$this->ds_facultad = "";
		
		$this->cat = new Cat();
		
		
		
		
	}

	public function getNu_codigo()
	{
	    return $this->nu_codigo;
	}

	public function setNu_codigo($nu_codigo)
	{
	    $this->nu_codigo = $nu_codigo;
	}

	public function getDs_facultad()
	{
	    return $this->ds_facultad;
	}

	public function setDs_facultad($ds_facultad)
	{
	    $this->ds_facultad = $ds_facultad;
	}
	

	public function getCat()
	{
	    return $this->cat;
	}

	public function setCat($cat)
	{
	    $this->cat = $cat;
	}
}
?>