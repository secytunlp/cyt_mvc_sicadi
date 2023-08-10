<?php

/**
 * TipoPresupuesto
 *  
 * @author Marcos
 * @since 22-11-2013
 */


class TipoPresupuesto  extends Entity{

    //variables de instancia.

    private $ds_tipopresupuesto;
    

    public function __construct(){
    	
    	$this->ds_tipopresupuesto = "";
    }
    
    
    public function getDs_tipopresupuesto()
    {
        return $this->ds_tipopresupuesto;
    }

    public function setDs_tipopresupuesto($ds_tipopresupuesto)
    {
        $this->ds_tipopresupuesto = $ds_tipopresupuesto;
    }

}
?>