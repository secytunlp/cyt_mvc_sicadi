<?php

/**
 * Acción para eliminar rendiciones.
 *
 * @author Marcos
 * @since 07-03-2016
 *
 */
class DeleteRendicionAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return CYTSecureManagerFactory::getRendicionManager();
	}

	

}
