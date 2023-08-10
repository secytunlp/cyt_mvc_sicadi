<?php

/**
 * Acción para dar de alta evaluadores
 *
 * @author Marcos
 * @since 16-05-2014
 *
 */
class AssignEvaluadoresAction extends AddEntityAction{
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEvaluadoresForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oEvaluadores = new Evaluadores();
		
		return $oEvaluadores;
	}

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
