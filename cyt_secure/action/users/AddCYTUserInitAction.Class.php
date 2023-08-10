<?php

/**
 * Acción para inicializar el contexto
 * para editar un user.
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */

class AddCYTUserInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		
		$form = new CMPUserForm($action);
		
		//reseteamos los perfiles de sesión.
		$manager = new UserUserGroupSessionManager();
		$manager->deleteAll();
		
		return $form;
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new User();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CDT_SECURE_MSG_CDTUSER_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_cdtuser";
	}



}
