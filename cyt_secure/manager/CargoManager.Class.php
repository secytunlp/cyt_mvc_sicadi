<?php

/**
 * Manager para Cargo
 *  
 * @author Marcos
 * @since 31-10-2013
 */
class CargoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getCargoDAO();
	}

}
?>
