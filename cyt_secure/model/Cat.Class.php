<?php

/**
 * Cat
 *  
 * @author Marcos
 * @since 14-11-2013
 */


class Cat  extends Entity{

    //variables de instancia.

    private $ds_cat;
    

    public function __construct(){
    	
    	$this->ds_cat = "";
    }
    
    
    public function getDs_cat()
    {
        return $this->ds_cat;
    }

    public function setDs_cat($ds_cat)
    {
        $this->ds_cat = $ds_cat;
    }
    
	public function __toString(){
		
		return $this->getDs_cat();
	}

}
?>