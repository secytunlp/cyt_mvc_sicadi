<?php

/**
 * Formulario para Universidad
 *
 * @author Marcos
 * @since 11-07-2014
 */
class CMPUniversidadForm extends CMPForm{

	/**
	 * se construye el formulario para editar una localidad
	 */
	public function __construct($action="", $id="edit_universidad") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CYT_LBL_UNIVERSIDAD_NOMBRE, "ds_universidad", CYT_MSG_UNIVERSIDAD_NOMBRE_REQUIRED  ) );
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_universidades';");
		$this->setUseAjaxSubmit( true );
	}

}
?>
