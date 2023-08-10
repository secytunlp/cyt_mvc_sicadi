<?php

/**
 * Acción para dar de alta una universidad en un popup.
 * 
 * @author Marcos
 * @since 11/07/2014
 */
class AddUniversidadPopupInitAction  extends AddUniversidadInitAction {

	/**
	 * layout a utilizar para la salida.
	 * @return Layout
	 */
	protected function getLayout(){
		return new CdtLayoutBasicAjax();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = parent::getNewFormInstance($action);
		
		$onCancel = CdtUtils::getParam("onCancel");
		$form->setOnCancel($onCancel);
		
		$onSuccesCallback = CdtUtils::getParam("onSuccessCallback");
		$form->setOnSuccessCallback( $onSuccesCallback );
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$universidad =  parent::getNewEntityInstance();
		$universidad->setDs_universidad( urldecode( CdtUtils::getParam("text") ) );
		return $universidad;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return "";
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "add_universidad";
	}


}