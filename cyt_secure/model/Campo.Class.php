<?php

/**
 * Campo
 *
 * @author Marcos
 * @since 18-09-2017
 */

class Campo extends Entity{

	//variables de instancia.
	
	

	private $ds_campo;
	
	
	

	public function __construct(){
		
		$this->ds_campo = '';
		
		
		
	}



	

	

		public function getDs_campo()
		{
		    return $this->ds_campo;
		}

		public function setDs_campo($ds_campo)
		{
		    $this->ds_campo = $ds_campo;
		}
}
?>