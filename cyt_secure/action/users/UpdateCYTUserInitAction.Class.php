<?php

/**
 * Acción para inicializar el contexto
 * para editar un user.
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */

class UpdateCYTUserInitAction extends UpdateEntityInitAction {

	
	protected function getEntity(){

		$entity = parent::getEntity();

			
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('user_oid', $entity->getOid(), '=');
		//perfiles.
		$oUserUserGroupsManager = CYTSecureManagerFactory::getUserUserGroupManager();
		$entity->setUsergroups( $oUserUserGroupsManager->getEntities($oCriteria) );
		
		
			
		
		return $entity;
	}
	
	protected function parseEntity($entity, XTemplate $xtpl) {

		$manager = new UserUserGroupSessionManager();
		$manager->setEntities( $entity->getUsergroups() );
		
		
		
		parent::parseEntity($entity, $xtpl);
		
	}
	
	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUserManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPUserForm($action);
		$username = $form->getInput("ds_username");
		$username->setIsEditable(false);
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
		return CDT_SECURE_MSG_CDTUSER_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_cdtuser";
	}


}