<?php

/**
 * Manager para Especialidad
 *  
 * @author Marcos
 * @since 18-09-2017
 */
class EspecialidadManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getEspecialidadDAO();
	}

}
?>
