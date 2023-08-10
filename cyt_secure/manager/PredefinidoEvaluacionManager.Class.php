<?php

/**
 * Manager para PredefinidoEvaluacion
 *  
 * @author Marcos
 * @since 20-08-2019
 */
class PredefinidoEvaluacionManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getPredefinidoEvaluacionDAO();
	}

}
?>
