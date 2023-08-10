<?php

/**
 * Categoria
 *  
 * @author Marcos
 * @since 29-10-2013
 */


class Categoria  extends Entity{

    //variables de instancia.

    private $ds_categoria;
    

    public function __construct(){
    	
    	$this->ds_categoria = "";
    }
    
    
    public function getDs_categoria()
    {
        return $this->ds_categoria;
    }

    public function setDs_categoria($ds_categoria)
    {
        $this->ds_categoria = $ds_categoria;
    }
    
	public function __toString(){
		
		return $this->getDs_categoria();
	}

}
?>