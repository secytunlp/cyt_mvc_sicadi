<?php

/**
 * Manager para Cat
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class CatManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getCatDAO();
	}

}
?>
