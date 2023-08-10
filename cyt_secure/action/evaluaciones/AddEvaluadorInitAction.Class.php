<?php

/**
 * Acción para inicializar el contexto
 * para editar evaluador.
 *
 * @author Marcos
 * @since 09-04-2018
 *
 */

class AddEvaluadorInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPEvaluadorForm($action);
		/*$tercero = $form->getInput("evaluadorTercero.oid");
		
		$tercero->setIsEditable(false);*/
		
		
		return $form;
		
	}
	
	
 	

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oEvaluador = new Evaluador();
		$filter = new CMPEvaluacionFilter();
		$filter->fillSavedProperties();
		$oEvaluador->setSolicitud($filter->getSolicitud());
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('solicitud_oid', $filter->getSolicitud()->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerSolicitudEstado =  CYTSecureManagerFactory::getSolicitudEstadoManager();
		$oSolicitudEstado = $managerSolicitudEstado->getEntity($oCriteria);
		if (($oSolicitudEstado->getEstado()->getOid()!=CYT_ESTADO_SOLICITUD_ADMITIDA)&&($oSolicitudEstado->getEstado()->getOid()!=CYT_ESTADO_SOLICITUD_EN_EVALUACION)) {
			
			throw new GenericException( CYT_MSG_EVALUADORES_PROHIBIDO_AGREGAR2);
		}	
		
		
		return $oEvaluador;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CYT_MSG_EVALUACION_TITLE_AGREGAR;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_evaluador";
	}


}
