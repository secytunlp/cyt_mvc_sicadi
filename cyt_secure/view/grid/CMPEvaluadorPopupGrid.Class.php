<?php

/**
 * componente grilla para evaluador
 *
 * @author Marcos
 * @since 16-05-2014
 *
 */
class CMPEvaluadorPopupGrid extends CMPEvaluadorGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}