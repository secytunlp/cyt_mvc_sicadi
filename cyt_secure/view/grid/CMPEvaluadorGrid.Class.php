<?php

/**
 * componente grilla para evaluadores
 *
 * @author Marcos
 * @since 16-05-2014
 *
 */
class CMPEvaluadorGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPEvaluadorFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EvaluadorGridModel() );
		//$this->setRenderer( );
	}

}