<?php

/**
 * Acción para cambiar el estado de la rendicion
 *
 * @author Marcos
 * @since 08-03-2016
 *
 */
class CambiarEstadoRendicionAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		
		$this->getEntityManager()->cambiarEstado($entity->getRendicion(),$entity->getEstado(),$entity->getMotivo() );
		$result["oid"] = $entity->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPCambiarEstadoRendicionForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new CambiarEstadoRendicion();
	}

	protected function getEntityManager(){
		return CYTSecureManagerFactory::getRendicionManager();
	}



	


}
