<?php

/**
 * Manager para Deddoc
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class DeddocManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getDeddocDAO();
	}

}
?>
