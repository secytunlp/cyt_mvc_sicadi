<?php

/**
 * Manager para Disciplina
 *  
 * @author Marcos
 * @since 12-06-2015
 */
class DisciplinaManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getDisciplinaDAO();
	}

}
?>
