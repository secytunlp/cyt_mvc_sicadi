<?php

/**
 * Helper manager para administrar en sesión los perfiles de un usuario
 *  
 * @author Marcos
 * @since 11-11-2013
 */
class UserUserGroupSessionManager extends EntityManager{

	public function getDAO(){
		return new UserUserGroupSessionDAO();
	}
	
	public function deleteAll() {
    	$this->getDAO()->deleteAll();
    }
    
    public function setEntities( $entities ) {
    	$this->getDAO()->setEntities($entities);
    }
    
    protected function validateOnAdd(Entity $entity){
    	
    	//TODO validaciones	
    }
    
	protected function validateOnUpdate(Entity $entity){
		//TODO validaciones
	}

	protected function validateOnDelete($id){
		//TODO validaciones
	}	
}

?>
