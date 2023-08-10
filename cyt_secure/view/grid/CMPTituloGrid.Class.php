<?php

/**
 * componente grilla para títulos
 *
 * @author Marcos
 * @since 03-01-2014
 *
 */
class CMPTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPTituloFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TituloGridModel() );
		//$this->setRenderer( );
	}

}