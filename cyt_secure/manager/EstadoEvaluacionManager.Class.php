<?php

/**
 * Manager para Estado
 *  
 * @author Marcos
 * @since 16-11-2013
 */
class EstadoEvaluacionManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getEstadoEvaluacionDAO();
	}

}
?>
