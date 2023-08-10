<?php

/**
 * Manager para Solicitud Estado
 *  
 * @author Marcos
 * @since 16-11-2013
 */
class SolicitudEstadoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getSolicitudEstadoDAO();
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
