<?php

/**
 * componente grilla para evaluaciones estado
 *
 * @author Marcos
 * @since 03-12-2013
 *
 */
class CMPEvaluacionEstadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPEvaluacionEstadoFilter();
		
		$evaluacion_oid = CdtUtils::getParam('id');
			
		if (!empty( $evaluacion_oid )) {
			$evaluacion = new Evaluacion();
			$evaluacion->setOid($evaluacion_oid);
			$filter->setEvaluacion( $evaluacion );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EvaluacionEstadoGridModel() );
		//$this->setRenderer( );
	}

}