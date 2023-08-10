<?php

/**
 * Cargo
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class Cargo  extends Entity{

    //variables de instancia.

    private $ds_cargo;
    
    private $nu_orden;
    

    public function __construct(){
    	
    	$this->ds_cargo = "";
    }
    
    
    public function getDs_cargo()
    {
        return $this->ds_cargo;
    }

    public function setDs_cargo($ds_cargo)
    {
        $this->ds_cargo = $ds_cargo;
    }


    public function getNu_orden()
    {
        return $this->nu_orden;
    }

    public function setNu_orden($nu_orden)
    {
        $this->nu_orden = $nu_orden;
    }
}
?>