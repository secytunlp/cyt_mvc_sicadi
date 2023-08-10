<?php

/**
 * Acción para inicializar el contexto
 * para editar evaluaciones.
 *
 * @author Marcos
 * @since 13-05-2014
 *
 */

class AssignEvaluadoresInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPEvaluadoresForm($action);
		/*$tercero = $form->getInput("evaluadorTercero.oid");
		
		$tercero->setIsEditable(false);*/
		
		
		return $form;
		
	}
	
	protected function getEntity(){
		$entity = parent::getEntity();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_solicitud', $entity->getSolicitud()->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$oCriteria->addOrder('bl_interno','DESC');
		$oCriteria->addOrder('cd_evaluacion','ASC');
		$managerEvaluacion = ManagerFactory::getEvaluacionManager();
		$oEvaluaciones = $managerEvaluacion->getEntities($oCriteria);
		$nu_puntaje1 = 0;
		$estado_oid1 = 0;
		$nu_puntaje2 = 0;
		$estado_oid2 = 0;
		if ($oEvaluaciones->getObjectByIndex(0)) {
			if ($oEvaluaciones->getObjectByIndex(0)->getBl_interno()==1) {
				$entity->setEvaluadorInterno($oEvaluaciones->getObjectByIndex(0)->getUser());
			}
			else{
				$entity->setEvaluadorExterno($oEvaluaciones->getObjectByIndex(0)->getUser());
			}
			$entity->setEvaluadorInterno($oEvaluaciones->getObjectByIndex(0)->getUser());
			$nu_puntaje1 = $oEvaluaciones->getObjectByIndex(0)->getNu_puntaje();
			$estado_oid1 = $oEvaluaciones->getObjectByIndex(0)->getEstado()->getOid();
		}
		if ($oEvaluaciones->getObjectByIndex(1)) {
			$entity->setEvaluadorExterno($oEvaluaciones->getObjectByIndex(1)->getUser());
			$nu_puntaje2 = $oEvaluaciones->getObjectByIndex(1)->getNu_puntaje();
			$estado_oid2 = $oEvaluaciones->getObjectByIndex(1)->getEstado()->getOid();
		}		
		/*if ($oEvaluaciones->getObjectByIndex(2)) {
			$entity->setEvaluadorTercero($oEvaluaciones->getObjectByIndex(2)->getUser());
		}
		$form = $this->getForm();
		$tercero = $form->getInput("evaluadorTercero.oid");
		$nu_diferencia = abs($nu_puntaje1-$nu_puntaje2);
		CdtUtils::log($nu_diferencia.' - '.$estado_oid1.' - '.$estado_oid2);
		if (($nu_diferencia>=CYT_DIFERENCIA)&&($estado_oid1==CYT_ESTADO_SOLICITUD_EVALUADA)&&($estado_oid2==CYT_ESTADO_SOLICITUD_EVALUADA)) {
			$tercero->setIsEditable(true);
		}
		else $tercero->setIsEditable(false);*/
		
		return $entity;
	}
 	

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oEvaluadores = new Evaluadores();
		$filter = new CMPEvaluacionFilter();
		$filter->fillSavedProperties();
		$oEvaluadores->setSolicitud($filter->getSolicitud());
		
		return $oEvaluadores;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CYT_MSG_EVALUACION_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "assign_evaluadores";
	}


}
