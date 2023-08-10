<?php

/**
 * Carrerainv
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class CarreraInv  extends Entity{

    //variables de instancia.

    private $ds_carrerainv;
    

    public function __construct(){
    	
    	$this->ds_carrerainv = "";
    }
    
    
    public function getDs_carrerainv()
    {
        return $this->ds_carrerainv;
    }

    public function setDs_carrerainv($ds_carrerainv)
    {
        $this->ds_carrerainv = $ds_carrerainv;
    }

}
?>