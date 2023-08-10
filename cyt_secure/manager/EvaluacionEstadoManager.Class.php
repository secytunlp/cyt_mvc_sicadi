<?php

/**
 * Manager para Evaluacion Estado
 *  
 * @author Marcos
 * @since 03-12-2013
 */
class EvaluacionEstadoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getEvaluacionEstadoDAO();
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
