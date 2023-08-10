<?php

/**
 * componente grilla para títulos de posgrado
 *
 * @author Marcos
 * @since 27-06-2014
 *
 */
class CMPTituloPosgradoPopupGrid extends CMPTituloPosgradoGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}