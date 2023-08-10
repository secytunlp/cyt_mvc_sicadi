<?php

/**
 * NoRendidas
 *  
 * @author Marcos
 * @since 25-06-2014
 */


class NoRendidas  extends Entity{

    //variables de instancia.
    
	private $docente;
	
	private $nu_year;
    
   	private $nu_documento;
    

    public function __construct(){
    	
    	$this->docente = new Docente();
    	
    	$this->nu_documento = '';
    	
    	$this->nu_year = '';
    }
    
    

	

	public function getDocente()
	{
	    return $this->docente;
	}

	public function setDocente($docente)
	{
	    $this->docente = $docente;
	}

	public function getNu_year()
	{
	    return $this->nu_year;
	}

	public function setNu_year($nu_year)
	{
	    $this->nu_year = $nu_year;
	}

	public function getNu_documento()
	{
	    return $this->nu_documento;
	}

	public function setNu_documento($nu_documento)
	{
	    $this->nu_documento = $nu_documento;
	}
}
?>