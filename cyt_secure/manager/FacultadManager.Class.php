<?php

/**
 * Manager para Facultad
 *  
 * @author Marcos
 * @since 21-10-2013
 */
class FacultadManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getFacultadDAO();
	}

}
?>
