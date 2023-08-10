<?php

/**
 * componente grilla para evaluacion
 *
 * @author Marcos
 * @since 03-12-2013
 *
 */
class CMPEvaluacionPopupGrid extends CMPEvaluacionGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}