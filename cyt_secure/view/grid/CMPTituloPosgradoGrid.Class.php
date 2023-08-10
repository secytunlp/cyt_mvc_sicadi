<?php

/**
 * componente grilla para títulos de posgrado
 *
 * @author Marcos
 * @since 27-06-2014
 *
 */
class CMPTituloPosgradoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPTituloPosgradoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TituloPosgradoGridModel() );
		//$this->setRenderer( );
	}

}