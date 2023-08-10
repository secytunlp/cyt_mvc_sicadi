<?php

/**
 * TipoAcreditacion
 *  
 * @author Marcos
 * @since 20-11-2013
 */


class TipoAcreditacion  extends Entity{

    //variables de instancia.

    private $ds_tipoacreditacion;
    

    public function __construct(){
    	
    	$this->ds_tipoacreditacion = "";
    }
    
    
    public function getDs_tipoacreditacion()
    {
        return $this->ds_tipoacreditacion;
    }

    public function setDs_tipoacreditacion($ds_tipoacreditacion)
    {
        $this->ds_tipoacreditacion = $ds_tipoacreditacion;
    }

}
?>