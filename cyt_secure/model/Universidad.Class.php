<?php

/**
 * Universidad
 *  
 * @author Marcos
 * @since 12-12-2013
 */


class Universidad  extends Entity{

    //variables de instancia.

    private $ds_universidad;
    

    public function __construct(){
    	
    	$this->ds_universidad = "";
    }
    
    
    public function getDs_universidad()
    {
        return $this->ds_universidad;
    }

    public function setDs_universidad($ds_universidad)
    {
        $this->ds_universidad = $ds_universidad;
    }
    
	public function __toString(){
		
		return $this->getDs_universidad();
	}

}
?>