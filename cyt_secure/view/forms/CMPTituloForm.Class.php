<?php

/**
 * Formulario para Título
 *
 * @author Marcos
 * @since 11-07-2014
 */
class CMPTituloForm extends CMPForm{

	/**
	 * se construye el formulario para editar una localidad
	 */
	public function __construct($action="", $id="edit_titulo") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_TITULO_NOMBRE, "ds_titulo", CYT_MSG_TITULO_NOMBRE_REQUIRED  ) );
	
		$findPais = CYTSecureComponentsFactory::getFindUniversidadWithAdd(new Universidad(), CYT_LBL_TITULO_UNIVERSIDAD, CYT_MSG_TITULO_UNIVERSIDAD_REQUIRED, "titulo_universidad_oid", "universidad.oid", "titulo_universidad_change");
		$fieldset->addField( $findPais );
		
		$field = FieldBuilder::buildFieldSelect (CYT_LBL_TITULO_NIVEL, "nu_nivel", Nivel::getItems(), CYT_MSG_TITULO_NIVEL_REQUIRED, null, null, "--seleccionar--" );
		$fieldset->addField( $field );
		
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_titulos';");
		$this->setUseAjaxSubmit( true );
	}

}
?>
