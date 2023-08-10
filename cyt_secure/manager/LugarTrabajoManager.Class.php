<?php

/**
 * Manager para LugarTrabajo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class LugarTrabajoManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getLugarTrabajoDAO();
	}

	public function damePadre(LugarTrabajo $oLugarTrabajo, $sessionName){
		
		if ($oLugarTrabajo->getPadre()->getOid()) {
			$oPadre = $this->getObjectByCode($oLugarTrabajo->getPadre()->getOid());
			$sigla = ($oPadre->getDs_sigla())?" (".$oPadre->getDs_sigla().")":"";
			$_SESSION[$sessionName] .=$oPadre->getDs_unidad().$sigla.' - ';
			$this->damePadre($oPadre, $sessionName);
		}
		
		
	 	
	 }
	
}
?>
