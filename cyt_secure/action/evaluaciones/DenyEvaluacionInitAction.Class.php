<?php

/**
 * Acción para inicializar el contexto
 * para rechazar una evaluacion
 *
 * @author Marcos
 * @since 13-03-2017
 *
 */

class DenyEvaluacionInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPDenyEvaluacionForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$denyEvaluacion = new DenySolicitud();
		
		$oid = CdtUtils::getParam('id');
			
		if (!empty( $oid )) {
			$oUser = CdtSecureUtils::getUserLogged();
			
			$solicitud_oid = $oid;
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_solicitud', $solicitud_oid, '=');
			$oCriteria->addFilter('cd_usuario', $oUser->getCd_user(), '=');
			$oCriteria->addNull('fechaHasta');
			$managerEvaluacion =  ManagerFactory::getEvaluacionManager();
			$entity = $managerEvaluacion->getEntity($oCriteria);
			$denyEvaluacion->setSolicitud($entity->getSolicitud());
			
		}else{
		
			$entity = parent::getEntity();
		
		}
		
    	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('evaluacion_oid', $entity->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
		$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
		if (($oEvaluacionEstado->getEstado()->getOid()!=CYT_ESTADO_SOLICITUD_RECIBIDA)) {
			
			throw new GenericException( CYT_MSG_EVALUACION_ADMITIR_PROHIBIDO);
		}	
		
		
	
		return $denyEvaluacion;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CYT_MSG_EVALUACION_RECHAZAR;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "deny_evaluacion";
	}


}
