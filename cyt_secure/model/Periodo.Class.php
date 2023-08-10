<?php

/**
 * Periodo
 *  
 * @author Marcos
 * @since 13-11-2013
 */


class Periodo  extends Entity{

    //variables de instancia.

    private $ds_periodo;
    
   
    

    public function __construct(){
    	
    	$this->ds_periodo = "";
    }
    
    
    public function getDs_periodo()
    {
        return $this->ds_periodo;
    }

    public function setDs_periodo($ds_periodo)
    {
        $this->ds_periodo = $ds_periodo;
    }


   
}
?>