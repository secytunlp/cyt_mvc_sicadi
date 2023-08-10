<?php

/**
 * Manager para Organismo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class OrganismoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getOrganismoDAO();
	}

}
?>
