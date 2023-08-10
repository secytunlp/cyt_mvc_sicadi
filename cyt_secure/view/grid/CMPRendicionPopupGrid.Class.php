<?php

/**
 * componente grilla para rendicion
 *
 * @author Marcos
 * @since 05-10-2021
 *
 */
class CMPRendicionPopupGrid extends CMPRendicionGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}