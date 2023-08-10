<?php

/**
 * Acción para admitir una evaluacion.
 *
 * @author Marcos
 * @since 23-02-2017
 *
 */
class AdmitEvaluacionAction extends CdtEditAsyncAction {

	
    protected function getEntity() {
        $entity = null;

		//recuperamos dado su identifidor.
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
	
			
		}else{
		
			$entity = parent::getEntity();
		
		}
		
    	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('evaluacion_oid', $entity->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEvaluacionEstado =  CYTSecureManagerFactory::getEvaluacionEstadoManager();
		$oEvaluacionEstado = $managerEvaluacionEstado->getEntity($oCriteria);
		if (($oEvaluacionEstado->getEstado()->getOid()!=CYT_ESTADO_SOLICITUD_RECIBIDA)) {
			
			throw new GenericException( CYT_MSG_EVALUACION_ADMITIDA_PROHIBIDO);
		}			
		$manager = $this->getEntityManager();
		$entity = $manager->getEntityById($entity->getOid());
		
		return $entity;
    }

    /**
     * (non-PHPdoc)
     * @see CdtEditAsyncAction::edit();
     */
    protected function edit($entity) {
        $this->getEntityManager()->confirm($entity,CYT_ESTADO_SOLICITUD_EN_EVALUACION);
    }
    
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getEvaluacionManager();
	}


}