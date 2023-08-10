<?php

/**
 * Manager para Beca
 *  
 * @author Marcos
 * @since 18-12-2013
 */
class BecaManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getBecaDAO();
	}

}
?>
