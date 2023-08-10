<?php

/**
 * Acción para dar de alta un User
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */
class AddCYTUserAction extends AddEntityAction{

	
	
	
	protected function getEntity() {
	
		$entity =  parent::getEntity();
	
		//agregamos los perfiles relacionados al usuario.
		
		//usergroups.
		$usergroupsManager = new UserUserGroupSessionManager();
		$entity->setUsergroups( $usergroupsManager->getEntities(new CdtSearchCriteria()) );
		
		
	
		return $entity;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		$form = new CMPUserForm();
		return $form;
	}

	public function getNewEntityInstance(){
		return new User();
	}
	

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUserManager();
	}

	
	


}
