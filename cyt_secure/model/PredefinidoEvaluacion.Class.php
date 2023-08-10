<?php

/**
 * PredefinidoEvaluacion
 *  
 * @author Marcos
 * @since 20-18-2019
 */


class PredefinidoEvaluacion  extends Entity{

    //variables de instancia.

    private $ds_predefinido;
    
   
    

    public function __construct(){
    	
    	$this->ds_predefinido = "";
    }
    
    
    

    public function getDs_predefinido()
    {
        return $this->ds_predefinido;
    }

    public function setDs_predefinido($ds_predefinido)
    {
        $this->ds_predefinido = $ds_predefinido;
    }
}
?>