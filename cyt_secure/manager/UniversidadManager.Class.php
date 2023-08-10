<?php

/**
 * Manager para Universidad
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class UniversidadManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getUniversidadDAO();
	}

}
?>
