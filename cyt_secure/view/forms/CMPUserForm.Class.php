<?php

/**
 * Formulario para User
 *
 * @author Marcos
 * @since 11-11-2013
 */
class CMPUserForm extends CMPForm{
	
	public function getRenderer(){
		return new CMPUserFormRenderer();
	}

	/**
	 * se construye el formulario para editar el matriculado
	 */
	public function __construct($action="", $id="edit_user") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		
		$fieldCUIL = FieldBuilder::buildFieldText ( CDT_SECURE_LBL_CDTUSER_DS_USERNAME, "ds_username", CDT_SECURE_MSG_USERNAME_REQUIRED  );
		$fieldCUIL->getInput()->addProperty("maxlength", 13);
		$fieldCUIL->getInput()->addProperty("size", 13);
		$fieldset->addField( $fieldCUIL );
		
		
		
		$fieldNombre = FieldBuilder::buildFieldText ( CDT_SECURE_LBL_CDTUSER_DS_NAME, "ds_name", ""  );
		//$fieldNombre->getInput()->addProperty("maxlength", 100);
		$fieldset->addField( $fieldNombre );
		
		
		
		$fieldset->addField( FieldBuilder::buildFieldEmail ( CDT_SECURE_LBL_CDTUSER_DS_EMAIL, "ds_email",CDT_SECURE_MSG_CDTUSER_DS_EMAIL_REQUIRED) );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CDT_SECURE_LBL_CDTUSER_DS_PHONE, "ds_phone","") );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CDT_SECURE_LBL_CDTUSER_DS_ADDRESS, "ds_address","") );
		
		$fieldFacultad = FieldBuilder::buildFieldSelect (CYT_LBL_FACULTAD, "facultad.oid", CYTSecureUtils::getFacultadesItems(), "", null, null, "--seleccionar--", "facultad_oid" );
		$fieldset->addField( $fieldFacultad );
		
		$this->addFieldset($fieldset);

		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "ds_password", "") );
		

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_cdtusers';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
