<?php

/**
 * Manager para Tipoinvestigador
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoinvestigadorManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getTipoinvestigadorDAO();
	}

}
?>
