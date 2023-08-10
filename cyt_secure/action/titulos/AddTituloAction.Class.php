<?php

/**
 * Acción para dar de alta una título
 *
 * @author Marcos
 * @since 11-07-2014
 *
 */
class AddTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Titulo();
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getTituloManager();
	}

}
