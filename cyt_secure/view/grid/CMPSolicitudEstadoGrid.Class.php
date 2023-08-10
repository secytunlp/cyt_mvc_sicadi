<?php

/**
 * componente grilla para solicitudes estado
 *
 * @author Marcos
 * @since 16-11-2013
 *
 */
class CMPSolicitudEstadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPSolicitudEstadoFilter();
		
		$solicitud_oid = CdtUtils::getParam('id');
			
		if (!empty( $solicitud_oid )) {
			$solicitud = new Solicitud();
			$solicitud->setOid($solicitud_oid);
			$filter->setSolicitud( $solicitud );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new SolicitudEstadoGridModel() );
		//$this->setRenderer( );
	}

}