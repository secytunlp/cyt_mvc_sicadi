<?php

/**
 * componente grilla para lugar de trabajo
 *
 * @author Marcos
 * @since 02-11-2013
 *
 */
class CMPLugarTrabajoPopupGrid extends CMPLugarTrabajoGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}