<?php

/**
 * Manager para Campo
 *  
 * @author Marcos
 * @since 18-09-2017
 */
class CampoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getCampoDAO();
	}

}
?>
