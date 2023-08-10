<?php

/**
 * Acción para rechazar la evaluacion
 *
 * @author Marcos
 * @since 13-03-2017
 *
 */
class DenyEvaluacionAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$oUser = CdtSecureUtils::getUserLogged();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
		$oCriteria->addFilter('cd_usuario', $oUser->getCd_user(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEvaluacion =  ManagerFactory::getEvaluacionManager();
		$evaluacion = $managerEvaluacion->getEntity($oCriteria);
		
		
		$this->getEntityManager()->confirm($evaluacion,CYT_ESTADO_SOLICITUD_NO_ADMITIDA,$entity->getObservaciones() );
		$result["oid"] = $evaluacion->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPDenyEvaluacionForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new DenySolicitud();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEvaluacionManager();
	}



	


}
