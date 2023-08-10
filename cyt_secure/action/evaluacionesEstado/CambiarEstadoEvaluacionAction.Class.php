<?php

/**
 * Acción para cambiar el estado de la evaluacion
 *
 * @author Marcos
 * @since 19-05-2014
 *
 */
class CambiarEstadoEvaluacionAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		
		$this->getEntityManager()->cambiarEstado($entity->getEvaluacion(),$entity->getEstado(),$entity->getMotivo() );
		$result["oid"] = $entity->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPCambiarEstadoEvaluacionForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new CambiarEstadoEvaluacion();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEvaluacionManager();
	}



	


}
