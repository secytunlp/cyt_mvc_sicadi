<?php

/**
 * componente grilla para lugares de trabajo
 *
 * @author Marcos
 * @since 02-11-2013
 *
 */
class CMPLugarTrabajoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPLugarTrabajoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new LugarTrabajoGridModel() );
		//$this->setRenderer( );
	}

}