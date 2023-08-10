<?php

/**
 * Formulario para CambiarEstadoRendicion
 *
 * @author Marcos
 * @since 08-03-2016
 */
class CMPCambiarEstadoRendicionForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_cambiarEstadoRendicion") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findRendicion = CYTSecureComponentsFactory::getFindRendicion(new Rendicion(), CYT_LBL_RENDICION, CYT_MSG_RENDICION_ESTADO_RENDICION_REQUIRED, "rendicion_form_estado_oid", "rendicion.oid", "estado_filter_rendicion_change");
		//$findSolicitud->getInput()->setInputSize(5,80);
		$fieldset->addField( $findRendicion );
		
		$fieldEstado = FieldBuilder::buildFieldSelect (CYT_LBL_ESTADO, "estado.oid", CYTSecureUtils::getEstadosItems(), CYT_MSG_SOLICITUD_ESTADO_ESTADO_REQUIRED, null, null, "--seleccionar--" );
		$fieldset->addField( $fieldEstado );
		
		$fieldset->addField( FieldBuilder::buildFieldTextArea ( CYT_LBL_SOLICITUD_ESTADO_MOTIVO, "motivo"  ) );
		
		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_rendicionesEstado';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
