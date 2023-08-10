<?php

/**
 * Manager para UnidadAprobada
 *  
 * @author Marcos
 * @since 29-05-2014
 */
class UnidadAprobadaManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getUnidadAprobadaDAO();
	}

}
?>
