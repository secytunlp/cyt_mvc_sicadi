<?php

/**
 * componente grilla para universidades
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPUniversidadGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPUniversidadFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new UniversidadGridModel() );
		//$this->setRenderer( );
	}

}