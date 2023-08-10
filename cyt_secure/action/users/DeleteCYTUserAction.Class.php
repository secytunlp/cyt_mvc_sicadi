<?php

/**
 * Acción para eliminar usuarios.
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */
class DeleteCYTUserAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUserManager();
	}

	

}
