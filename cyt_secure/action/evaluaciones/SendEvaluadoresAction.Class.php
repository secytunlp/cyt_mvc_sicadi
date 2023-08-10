<?php

/**
 * Acción para enviar a evaluadores.
 *
 * @author Marcos
 * @since 16-05-2014
 *
 */
class SendEvaluadoresAction extends CdtEditAsyncAction {

	
    protected function getEntity() {
        $oEvaluadores = new Evaluadores();
		$filter = new CMPEvaluacionFilter();
		$filter->fillSavedProperties();
		$oEvaluadores->setSolicitud($filter->getSolicitud());
		
    	/*$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_solicitud', $oEvaluadores->getSolicitud()->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$oCriteria->addOrder('bl_interno','DESC');
		$oCriteria->addOrder('cd_evaluacion','ASC');
		$managerEvaluacion = ManagerFactory::getEvaluacionManager();
		$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
		if ($oEvaluaciones->getObjectByIndex(0)) {
			$oEvaluadores->setEvaluadorInterno($oEvaluaciones->getObjectByIndex(0)->getUser());
		}
		if ($oEvaluaciones->getObjectByIndex(1)) {
			$oEvaluadores->setEvaluadorExterno($oEvaluaciones->getObjectByIndex(1)->getUser());
		}		
		if ($oEvaluaciones->getObjectByIndex(2)) {
			$oEvaluadores->setEvaluadorTercero($oEvaluaciones->getObjectByIndex(2)->getUser());
		}*/
		
		
		return $oEvaluadores;
    }

    /**
     * (non-PHPdoc)
     * @see CdtEditAsyncAction::edit();
     */
    protected function edit($entity) {
        $this->getEntityManager()->send($entity);
    }
    
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return CYTSecureManagerFactory::getEvaluadoresManager();
	}
	
	protected function getInfoMessage( $entity, $result ){
		//CdtUtils::setRequestInfo(1, CDT_UI_SUBMIT_SUCCESS);
		if ($entity->getError() != '') {
			return $entity->getError();	
		}
		else return CDT_UI_SUBMIT_SUCCESS;	
	}


}