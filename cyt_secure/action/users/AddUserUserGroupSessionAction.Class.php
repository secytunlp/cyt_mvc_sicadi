<?php 

/**
 * Acción para dar de alta un perfil de usuario.
 * El alta es sólo en sesión para ir armando el usuario.
 * 
 * @author Marcos
 * @since 11-111-2013
 * 
 */
class AddUserUserGroupSessionAction extends AddEntityAction{

	protected function edit( $entity ){
		
		parent::edit($entity);	
		
		//vamos a retornar por json las usergroups del usuario.
		
		//usamos el renderer para reutilizar lo que mostramos de las usergroups.
		$renderer = new CMPUserFormRenderer();
		$usergroups = array();
		foreach ($this->getEntityManager()->getEntities(new CdtSearchCriteria()) as $usergroup) {
			
			$usergroups[] = $renderer->buildArrayUsergroup($usergroup);
		}		
		
		return array("usergroups" => $usergroups, 
						"usergroupColumns" => $renderer->getUsergroupColumns(),
						"usergroupColumnsAlign" => $renderer->getUsergroupColumnsAlign(),
						"usergroupColumnsLabels" => $renderer->getUsergroupColumnsLabels());

	}


	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPUserUserGroupForm();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new UserUserGroup();
	}
	
	protected function getEntityManager(){
		return new UserUserGroupSessionManager();
	}
	
}