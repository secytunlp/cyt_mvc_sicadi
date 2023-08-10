<?php 

/**
 * Acción para quitar un perfil de usuario.
 * Es sólo en sesión para ir armando el usuario.
 * 
 * @author Marcos
 * @since 11-11-2013
 * 
 */
class DeleteUserUserGroupSessionAction extends EditEntityAction{

	protected function edit( $entity ){
		
		$cd_usergroup = CdtUtils::getParam("item_oid");
		
		//el oid representa el dato "cd_usergroup" ya que no hay entity relacionada
		$this->getEntityManager()->delete( $cd_usergroup );

		
		//vamos a retornar por json los perfiles del usuario.
		
		//usamos el renderer para reutilizar lo que mostramos de los perfiles.
		$renderer = new CMPUserFormRenderer();
		$oUserGroups = array();
		foreach ($this->getEntityManager()->getEntities(new CdtSearchCriteria()) as $facultad) {
			
			$oUserGroups[] = $renderer->buildArrayUsergroup($facultad);
		}		
		
		return array("usergroups" => $oUserGroups, 
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
