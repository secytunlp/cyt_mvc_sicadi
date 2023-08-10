<?php

/**
 * Manager para Evaluadores
 *  
 * @author Marcos
 * @since 16-05-2014
 */
class EvaluadoresManager extends EntityManager{

	public function getDAO(){
		//return DAOFactory::getPresupuestoDAO();
	}

	public function add(Entity $entity) {
		$error = '';
		if($entity->getEvaluadorInterno()!=null && $entity->getEvaluadorInterno()->getOid()!=null){
			$crear=1;  
			$oUserManager = CYTSecureManagerFactory::getUserManager();
			$oUsuario = $oUserManager->getObjectByCode($entity->getEvaluadorInterno()->getOid());
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
					$error .= CYT_MSG_EVALUADOR_INTERNO_NO_ENVIADO_1."<br>";
					$crear=0; 
				}
			}  	
			if ($crear) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
				$oCriteria->addFilter('bl_interno', 1, '=');
				$managerEvaluacion = ManagerFactory::getEvaluacionManager();
				$oEvaluacion = $managerEvaluacion->getEntity($oCriteria);
				if ($oEvaluacion) {
					if ($oEvaluacion->getUser()->getOid()!=$entity->getEvaluadorInterno()->getOid()) {
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('evaluacion_oid', $oEvaluacion->getOid(), '=');
						$oCriteria->addNull('fechaHasta');
						$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
						$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
						if (($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_NO_ADMITIDA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_EN_EVALUACION)) {
							//$managerEvaluacion->eliminarEvaluacion($oEvaluacion->getOid());
							$crear=2;
						}
						else {
							//$error .= CYT_MSG_EVALUADOR_INTERNO_EVALUADO."<br>";
							$crear=0;  
						}
					}
					else $crear=0;  
					
				}
			}
			
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			if ($crear==1) {
				$oEvaluacion = new Evaluacion();
				$oEvaluacion->setBl_interno(1);
				$oEvaluacion->setUser($entity->getEvaluadorInterno());
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
			elseif ($crear==2){
				$oEvaluacion->setUser($entity->getEvaluadorInterno());
				$oEvaluacion->setDt_fecha(date('YmdHis'));
				$managerEvaluacion->update($oEvaluacion);
				$oEstado = new Estado();
				$oEstado->setOid(CYT_ESTADO_SOLICITUD_CREADA);
				$managerEvaluacion->cambiarEstado($oEvaluacion, $oEstado);
			}
			
		}
		
		if($entity->getEvaluadorExterno()!=null && $entity->getEvaluadorExterno()->getOid()!=null){
			$crear=1;    
			$oUserManager = CYTSecureManagerFactory::getUserManager();
			$oUsuario = $oUserManager->getObjectByCode($entity->getEvaluadorExterno()->getOid());
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
					$error .= CYT_MSG_EVALUADOR_EXTERNO_NO_ENVIADO_1."<br>";
					$crear=0; 
				}
			}  
			if ($crear) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
				$oCriteria->addFilter('bl_interno', 0, '=');
				$oCriteria->addNull('fechaHasta');
				$oCriteria->addOrder('bl_interno','DESC');
				$oCriteria->addOrder('cd_evaluacion','ASC');
				$managerEvaluacion = ManagerFactory::getEvaluacionManager();
				$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
				if ($oEvaluaciones->getObjectByIndex(0)) {
					if ($oEvaluaciones->getObjectByIndex(0)->getUser()->getOid()!=$entity->getEvaluadorExterno()->getOid()) {
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('evaluacion_oid', $oEvaluaciones->getObjectByIndex(0)->getOid(), '=');
						$oCriteria->addNull('fechaHasta');
						$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
						$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
						if (($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_NO_ADMITIDA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_EN_EVALUACION)) {
							//$managerEvaluacion->eliminarEvaluacion($oEvaluaciones->getObjectByIndex(0)->getOid());
							$crear=2;
						}
						else{ 
							//$error .= CYT_MSG_EVALUADOR_EXTERNO_EVALUADO."<br>";
							$crear=0;
						}
					}
					else $crear=0;  
				}
			}
			
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			if ($crear==1) {
				$oEvaluacion = new Evaluacion();
				$oEvaluacion->setBl_interno(0);
				$oEvaluacion->setUser($entity->getEvaluadorExterno());
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
			elseif ($crear==2){
				$oEvaluacion = $oEvaluaciones->getObjectByIndex(0);			
				$oEvaluacion->setUser($entity->getEvaluadorExterno());
				$oEvaluacion->setDt_fecha(date('YmdHis'));
				$managerEvaluacion->update($oEvaluacion);
				$oEstado = new Estado();
				$oEstado->setOid(CYT_ESTADO_SOLICITUD_CREADA);
				$managerEvaluacion->cambiarEstado($oEvaluacion, $oEstado,'');
			}
		}
		
		if($entity->getEvaluadorTercero()!=null && $entity->getEvaluadorTercero()->getOid()!=null){
			$crear=1; 
			$oUserManager = CYTSecureManagerFactory::getUserManager();
			$oUsuario = $oUserManager->getObjectByCode($entity->getEvaluadorTercero()->getOid());
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
					$error .= CYT_MSG_EVALUADOR_TERCERO_NO_ENVIADO_1."<br>";
					$crear=0; 
				}
			}    
			if ($crear) {
				if ($oEvaluaciones->getObjectByIndex(1)) {
					if ($oEvaluaciones->getObjectByIndex(1)->getUser()->getOid()!=$entity->getEvaluadorTercero()->getOid()) {
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('evaluacion_oid', $oEvaluaciones->getObjectByIndex(1)->getOid(), '=');
						$oCriteria->addNull('fechaHasta');
						$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
						$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
						if (($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_NO_ADMITIDA)||($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_EN_EVALUACION)) {
							//$managerEvaluacion->eliminarEvaluacion($oEvaluaciones->getObjectByIndex(1)->getOid());
							$crear=2;
						}
						else {
							//$error .= CYT_MSG_EVALUADOR_TERCERO_EVALUADO."<br>";
							$crear=0;
						}
					}
					else $crear=0;  
				}
				$managerEvaluacion = ManagerFactory::getEvaluacionManager();
				if ($crear==1) {
					$oEvaluacion = new Evaluacion();
					//$oEvaluacion->setBl_interno(0);
					$oEvaluacion->setUser($entity->getEvaluadorTercero());
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
				elseif ($crear==2){
					$oEvaluacion = $oEvaluaciones->getObjectByIndex(1);
					$oEvaluacion->setUser($entity->getEvaluadorTercero());
					$oEvaluacion->setDt_fecha(date('YmdHis'));
					$managerEvaluacion->update($oEvaluacion);
					$oEstado = new Estado();
					$oEstado->setOid(CYT_ESTADO_SOLICITUD_CREADA);
					$managerEvaluacion->cambiarEstado($oEvaluacion, $oEstado,'');
				}
			} 	
			
		}
		if ($error) {
    		throw new GenericException( $error );
    	}
    }	
    
    /*public function send(Entity $entity) {
		$error = '';
		if($entity->getEvaluadorInterno()!=null && $entity->getEvaluadorInterno()->getOid()!=null){
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
			$oCriteria->addFilter('cd_usuario', $entity->getEvaluadorInterno()->getOid(), '=');
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			$oEvaluacion = $managerEvaluacion->getEntity($oCriteria);
			if ($oEvaluacion) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('evaluacion_oid', $oEvaluacion->getOid(), '=');
				$oCriteria->addNull('fechaHasta');
				$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
				$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
				if ((($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA))){
					$managerEvaluacion->sendSolicitud($oEvaluacion);
					
				}
				else $error .= CYT_MSG_EVALUADOR_INTERNO_NO_ENVIADO."<br>";
			
			}
			
			
		}
    	if($entity->getEvaluadorExterno()!=null && $entity->getEvaluadorExterno()->getOid()!=null){
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
			$oCriteria->addFilter('cd_usuario', $entity->getEvaluadorExterno()->getOid(), '=');
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			$oEvaluacion = $managerEvaluacion->getEntity($oCriteria);
			if ($oEvaluacion) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('evaluacion_oid', $oEvaluacion->getOid(), '=');
				$oCriteria->addNull('fechaHasta');
				$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
				$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
				if ((($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA))){
					$managerEvaluacion->sendSolicitud($oEvaluacion);
					
				}
				else $error .= CYT_MSG_EVALUADOR_EXTERNO_NO_ENVIADO."<br>";
			
			}
			
			
		}
		
    	if($entity->getEvaluadorTercero()!=null && $entity->getEvaluadorTercero()->getOid()!=null){
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
			$oCriteria->addFilter('cd_usuario', $entity->getEvaluadorTercero()->getOid(), '=');
			$managerEvaluacion = ManagerFactory::getEvaluacionManager();
			$oEvaluacion = $managerEvaluacion->getEntity($oCriteria);
			if ($oEvaluacion) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('evaluacion_oid', $oEvaluacion->getOid(), '=');
				$oCriteria->addNull('fechaHasta');
				$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
				$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
				if ((($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA))){
					$managerEvaluacion->sendSolicitud($oEvaluacion);
					
				}
				else $error .= CYT_MSG_EVALUADOR_TERCERO_NO_ENVIADO."<br>";
			
			}
			
			
		}
		
		$entity->setError($error);
		
    }	*/
    
    public function send(Entity $entity) {
    	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		//$oCriteria->addOrder('bl_interno','DESC');
		$oCriteria->addOrder('cd_evaluacion','ASC');
		$managerEvaluacion = ManagerFactory::getEvaluacionManager();
		$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
    	
		$error = '';
		foreach ($oEvaluaciones as $oEvaluacion) {
			
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('evaluacion_oid', $oEvaluacion->getOid(), '=');
			$oCriteria->addNull('fechaHasta');
			$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
			$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
			if ((($oEvaluacionEstado->getEstado()->getOid()==CYT_ESTADO_SOLICITUD_CREADA))){
				$managerEvaluacion->sendSolicitud($oEvaluacion);
				
			}
			else {
				$managerUser = CYTSecureManagerFactory::getUserManager();
				$oUsuario = $managerUser->getObjectByCode($oEvaluacion->getUser()->getOid());
	
				$msg = CYT_MSG_EVALUADOR_NO_ENVIADO;
	    		$params = array ($oUsuario->getDs_name());		
	    		$error .=CdtFormatUtils::formatMessage( $msg, $params ).'<br />';
			}
				
				
				
				
			
		}
		
    	
		
		$entity->setError($error);
		
    }	
    
     public function update(Entity $entity) {
     	
     	
		parent::update($entity);
     }

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        
		parent::delete( $id );
		
    	
    }
	
	
	
	
}
?>
