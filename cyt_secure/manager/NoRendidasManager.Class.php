<?php

/**
 * Manager para NoRendidas
 *  
 * @author Marcos
 * @since 25-06-2014
 */
class NoRendidasManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getNoRendidasDAO();
	}
	
	public function add(Entity $entity) {
		
		parent::add($entity);
	}

}
?>
