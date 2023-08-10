<?php

/**
 * componente grilla para títulos
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPTituloPopupGrid extends CMPTituloGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}