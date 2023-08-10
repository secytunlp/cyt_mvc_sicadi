<?php

/**
 * Formulario para RechazarRendicion
 *
 * @author Marcos
 * @since 07-06-2016
 */
class CMPDenyRendicionForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_rechazarRendicion") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findRendicion = CYTSecureComponentsFactory::getFindRendicion(new Rendicion(), CYT_LBL_RENDICION, CYT_MSG_RENDICON_ESTADO_RENDICION_REQUIRED, "rendicion_form_estado_oid", "rendicion.oid", "estado_filter_rendicion_change");
		//$findRendicion->getInput()->setInputSize(5,80);
		$fieldset->addField( $findRendicion );
		
		$fieldset->addField( FieldBuilder::buildFieldTextArea ( CYT_MSG_SOLICITUD_RECHAZAR_MOTIVOS, "observaciones", CYT_MSG_SOLICITUD_RECHAZAR_MOTIVOS_REQUIRED  ) );
		
		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_solicitudes';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
