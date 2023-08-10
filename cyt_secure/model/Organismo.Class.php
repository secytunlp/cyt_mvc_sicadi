<?php

/**
 * Organismo
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class Organismo  extends Entity{

    //variables de instancia.

    private $ds_organismo;
    
    private $ds_codigo;
    

    public function __construct(){
    	
    	$this->ds_organismo = "";
    	
    	$this->ds_codigo = "";
    }
    
    
    public function getDs_organismo()
    {
        return $this->ds_organismo;
    }

    public function setDs_organismo($ds_organismo)
    {
        $this->ds_organismo = $ds_organismo;
    }


	public function getDs_codigo()
	{
	    return $this->ds_codigo;
	}

	public function setDs_codigo($ds_codigo)
	{
	    $this->ds_codigo = $ds_codigo;
	}
}
?>