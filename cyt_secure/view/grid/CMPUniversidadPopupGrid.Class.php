<?php

/**
 * componente grilla para universidades
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPUniversidadPopupGrid extends CMPUniversidadGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}