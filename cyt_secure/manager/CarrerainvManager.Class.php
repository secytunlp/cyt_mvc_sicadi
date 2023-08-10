<?php

/**
 * Manager para Carrerainv
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CarrerainvManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getCarrerainvDAO();
	}

}
?>
