<?php

/**
 * componente grilla para evaluaciones
 *
 * @author Marcos
 * @since 02-12-2013
 *
 */
class CMPEvaluacionGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		
		$filter = new CMPEvaluacionFilter();
		
		$solicitud_oid = CdtUtils::getParam('id');
			
		if (!empty( $solicitud_oid )) {
			$solicitud = new Solicitud();
			$solicitud->setOid($solicitud_oid);
			$filter->setSolicitud( $solicitud );
			$filter->saveProperties();
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('solicitud_oid', $solicitud_oid, '=');
			$oCriteria->addNull('fechaHasta');
			$managerSolicitudEstado =  CYTSecureManagerFactory::getSolicitudEstadoManager();
			$oSolicitudEstado = $managerSolicitudEstado->getEntity($oCriteria);
			if (($oSolicitudEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA) || ($oSolicitudEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_RECIBIDA)|| ($oSolicitudEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_NO_ADMITIDA)|| ($oSolicitudEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_RETIRADA)) {
				
				throw new GenericException( CYT_MSG_EVALUADORES_PROHIBIDO_AGREGAR);
			}
		}
		/*else {
			$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
			$oPerioActual = $oPeriodoManager->getPeriodoActual(CYT_PERIODO_YEAR);
			//$filter = new CMPSolicitudFilter();
			$filter->setPeriodo($oPerioActual);
			$filter->saveProperties();
			$this->setFilter( $filter );
		}*/
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EvaluacionGridModel() );
		//$this->setRenderer( );
	}

}