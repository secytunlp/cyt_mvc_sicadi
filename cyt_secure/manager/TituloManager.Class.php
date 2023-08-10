<?php

/**
 * Manager para Titulo
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class TituloManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getTituloDAO();
	}

}
?>
