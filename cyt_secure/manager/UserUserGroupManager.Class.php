<?php

/**
 * Manager para User UserGroup
 *  
 * @author Marcos
 * @since 09-11-2013
 */
class UserUserGroupManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getUserUserGroupDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		
    }	
    
     public function update(Entity $entity) {
     	
     	
		parent::update($entity);
     }

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        
		parent::delete( $id );
		
    	
    }
	
	
	
	
}
?>
