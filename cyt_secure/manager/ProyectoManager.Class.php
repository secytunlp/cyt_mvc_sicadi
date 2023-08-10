<?php

/**
 * Manager para Proyecto
 *  
 * @author Marcos
 * @since 12-11-2013
 */
class ProyectoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getProyectoDAO();
	}

}
?>
