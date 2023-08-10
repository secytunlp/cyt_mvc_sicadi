<?php

/**
 * Formulario para CambiarEstadoEvaluacion
 *
 * @author Marcos
 * @since 19-05-2014
 */
class CMPCambiarEstadoEvaluacionForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_cambiarEstadoEvaluacion") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findEvaluacion = CYTSecureComponentsFactory::getFindEvaluacion(new Evaluacion(), CYT_LBL_EVALUACION, CYT_MSG_EVALUACION_ESTADO_EVALUACION_REQUIRED, "evaluacion_form_estado_oid", "evaluacion.oid", "estado_filter_evaluacion_change");
		//$findEvaluacion->getInput()->setInputSize(5,80);
		$fieldset->addField( $findEvaluacion );
		
		$fieldEstado = FieldBuilder::buildFieldSelect (CYT_LBL_ESTADO, "estado.oid", CYTSecureUtils::getEvaluacionEstadosItems(), CYT_MSG_SOLICITUD_ESTADO_ESTADO_REQUIRED, null, null, "--seleccionar--" );
		$fieldset->addField( $fieldEstado );
		
		$fieldset->addField( FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_ESTADO_MOTIVO, "motivo"  ) );
		
		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_evaluacionesEstado';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
