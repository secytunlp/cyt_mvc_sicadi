<?php

/**
 * Acción para inicializar el contexto
 * para cambiar el estado de una evaluacion
 *
 * @author Marcos
 * @since 19-05-2014
 *
 */

class CambiarEstadoEvaluacionInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPCambiarEstadoEvaluacionForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$cambiarEstadoEvaluacion = new CambiarEstadoEvaluacion();
		
		$filter = new CMPEvaluacionEstadoFilter();
		$filter->fillSavedProperties();
		$cambiarEstadoEvaluacion->setEvaluacion($filter->getEvaluacion());
	
		
		
		return $cambiarEstadoEvaluacion;
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
		return "cambiarEstadoEvaluacion";
	}


}
