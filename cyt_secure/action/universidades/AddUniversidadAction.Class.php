<?php

/**
 * Acción para dar de alta una universidad
 *
 * @author Marcos
 * @since 11-07-2014
 *
 */
class AddUniversidadAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPUniversidadForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Universidad();
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUniversidadManager();
	}

}
