<?php

/**
 * Formulario para CambiarEstadoSolicitud
 *
 * @author Marcos
 * @since 19-03-2014
 */
class CMPCambiarEstadoSolicitudForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_cambiarEstadoSolicitud") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findSolicitud = CYTSecureComponentsFactory::getFindSolicitud(new Solicitud(), CYT_LBL_SOLICITUD, CYT_MSG_SOLICITUD_ESTADO_SOLICITUD_REQUIRED, "solicitud_form_estado_oid", "solicitud.oid", "estado_filter_solicitud_change");
		$findSolicitud->getInput()->addProperty("class", "inputSignup");
		$fieldset->addField( $findSolicitud );
		
		$fieldEstado = FieldBuilder::buildFieldSelect (CYT_LBL_ESTADO, "estado.oid", CYTSecureUtils::getEstadosItems(), CYT_MSG_SOLICITUD_ESTADO_ESTADO_REQUIRED, null, null, "--seleccionar--" );
		$fieldEstado->getInput()->addProperty("class", "inputSignup");
		$fieldset->addField( $fieldEstado );
		
		$fieldset->addField( FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_ESTADO_MOTIVO, "motivo"  ) );

		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_solicitudesEstado';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
