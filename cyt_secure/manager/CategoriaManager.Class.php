<?php

/**
 * Manager para Categoria
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CategoriaManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getCategoriaDAO();
	}

}
?>
