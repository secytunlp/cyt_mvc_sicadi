<?php

/**
 * Manager para Evaluador
 *  
 * @author Marcos
 * @since 15-05-2014
 */
class EvaluadorManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getEvaluadorDAO();
	}

	public function add(Entity $entity) {
		$error = '';
		if($entity->getEvaluador()!=null && $entity->getEvaluador()->getOid()!=null){
			$crear=1;  
			$oUserManager = CYTSecureManagerFactory::getUserManager();
			$oUsuario = $oUserManager->getObjectByCode($entity->getEvaluador()->getOid());
			$separarCUIL = explode('-',trim($oUsuario->getDs_username()));
            $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
			$managerDocente =  CYTSecureManagerFactory::getDocenteManager();
			$oDocente = $managerDocente->getEntity($oCriteria);
			if (!empty($oDocente)) {
				$oCriteria = new CdtSearchCriteria();
				$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
				$oCriteria->addFilter("$tDocente.cd_docente", $oDocente->getOid(), '=');
				
				$oPeriodoManager = CYTSecureManagerFactory::getPeriodoManager();
				$oPerioActual = $oPeriodoManager->getPeriodoActual(CYT_PERIODO_YEAR);
				$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
				$oCriteria->addFilter("$tPeriodo.cd_periodo", $oPerioActual->getOid(), '=');
				$tSolicitudEstado = CYTSecureDAOFactory::getSolicitudEstadoDAO()->getTableName();
				$oCriteria->addFilter("$tSolicitudEstado.estado_oid", CYT_ESTADO_SOLICITUD_CREADA, '<>');
				$oCriteria->addNull('fechaHasta');
				
				$oSolicitudManager =  ManagerFactory::getSolicitudManager();
				$oSolicitudAux = $oSolicitudManager->getEntity($oCriteria);
				
				if(!empty($oSolicitudAux)){
					$error .= CYT_MSG_EVALUADOR_NO_ENVIADO_1."<br>";
					$crear=0; 
				}
			}  	
			
			
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			if ($crear==1) {
				$oEvaluacion = new Evaluacion();
				$oEvaluacion->setBl_interno($entity->getBl_interno());
				$oEvaluacion->setUser($entity->getEvaluador());
				$oEvaluacion->setSolicitud($entity->getSolicitud());
				$oEvaluacion->setDt_fecha(date('YmdHis'));
				
				$managerEvaluacion->add($oEvaluacion);
				$managerEstado = CYTSecureManagerFactory::getEstadoManager();
				$oEstado = $managerEstado->getObjectByCode(CYT_ESTADO_SOLICITUD_CREADA);
				$oEvaluacionEstado = new EvaluacionEstado();
				$oEvaluacionEstado->setEvaluacion($oEvaluacion);
				$oEvaluacionEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
				$oEvaluacionEstado->setEstado($oEstado);
				$oUser = CdtSecureUtils::getUserLogged();
				$oEvaluacionEstado->setUser($oUser);
				$oEvaluacionEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$managerEvaluacionEstado = CYTSecureManagerFactory::getEvaluacionEstadoManager();
				$managerEvaluacionEstado->add($oEvaluacionEstado);
			}
			
		
			
		}
		if ($error) {
    		throw new GenericException( $error );
    	}
    }
    
    
	
}
?>
