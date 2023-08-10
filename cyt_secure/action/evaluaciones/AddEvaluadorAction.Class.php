<?php

/**
 * Acción para dar de alta evaluador
 *
 * @author Marcos
 * @since 09-04-2018
 *
 */
class AddEvaluadorAction extends AddEntityAction{
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEvaluadorForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oEvaluador = new Evaluador();
		
		return $oEvaluador;
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getEvaluadorManager();
	}

	protected function getInfoMessage( $entity, $result ){
		//CdtUtils::setRequestInfo(1, CDT_UI_SUBMIT_SUCCESS);
		if ($entity->getError() != '') {
			return $entity->getError();	
		}
		else return CDT_UI_SUBMIT_SUCCESS;	
	}
	
	
}
