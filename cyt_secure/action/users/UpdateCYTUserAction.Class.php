<?php

/**
 * Acción para actualizar un usuario
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */
class UpdateCYTUserAction extends UpdateEntityAction{

	protected function getEntity() {
	
		$entity =  parent::getEntity();
	
		//agregamos los perfiles relacionados al usuario.
		
		//usergroups.
		$usergroupsManager = new UserUserGroupSessionManager();
		$entity->setUsergroups( $usergroupsManager->getEntities(new CdtSearchCriteria()) );
		
		
	
		return $entity;
	}
	
	public function getNewFormInstance(){
		return new CMPUserForm();
	}

	public function getNewEntityInstance(){
		return new User();
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getUserManager();
	}



	



}
