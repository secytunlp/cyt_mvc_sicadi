<?php

/**
 * Deddoc
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class DedDoc  extends Entity{

    //variables de instancia.

    private $ds_deddoc;
    

    public function __construct(){
    	
    	$this->ds_deddoc = "";
    }
    
    
    public function getDs_deddoc()
    {
        return $this->ds_deddoc;
    }

    public function setDs_deddoc($ds_deddoc)
    {
        $this->ds_deddoc = $ds_deddoc;
    }

}
?>