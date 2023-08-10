<?php

/**
 * Manager para Integrante
 *  
 * @author Marcos
 * @since 30-04-2014
 */
class IntegranteManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getIntegranteDAO();
	}

}
?>
