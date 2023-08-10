<?php

/**
 * Acción para inicializar el contexto
 * para cambiar el estado de una rendicion
 *
 * @author Marcos
 * @since 08-03-2016
 *
 */

class CambiarEstadoRendicionInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPCambiarEstadoRendicionForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$cambiarEstadoRendicion = new CambiarEstadoRendicion();
		
		$filter = new CMPRendicionEstadoFilter();
		$filter->fillSavedProperties();
		$cambiarEstadoRendicion->setRendicion($filter->getRendicion());
	
		
		
		return $cambiarEstadoRendicion;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CYT_MSG_SOLICITUD_ESTADO_CAMBIAR;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "cambiarEstadoRendicion";
	}


}
