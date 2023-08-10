<?php

/**
 * Formulario para perfiles del usuario
 *  
 * @author Marcos
 * @since 11-11-2013
 */
class CMPUserUserGroupForm extends CMPForm{


	public function getLegend(){
		return CYT_MSG_USER_USERGROUP_ASIGNAR;
		
	}
	
	/**
	 * se construye el formulario para editar un registro de encomienda
	 */
	public function __construct($action="add_user_userGroup_session",$id="edit_useruserGroup") {

		parent::__construct($id, CYT_MSG_ASIGNAR);
		
		$this->setCancelLabel( null );
		
		//properties del form.
    	$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		
		$this->setUseAjaxSubmit( true );
		
		$this->getRenderer()->setTemplateName( CDT_CMP_TEMPLATE_FORM_INLINE );
		
		$this->setOnSuccessCallback("add_usergroup");
		$this->setBeforeSubmit("before_submit_usergroup");
		

		$fieldset = new FormFieldset( $this->getLegend() );
		
		
		$fieldFacultad = FieldBuilder::buildFieldSelect (CDT_SECURE_LBL_CDTUSERGROUP, "userGroup.cd_usergroup", CYTSecureUtils::getUserGroupItems(), CDT_SECURE_MSG_CDTUSERGROUP_DS_USERGROUP_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldFacultad );
		
		$this->addFieldset($fieldset);
		
    }
    
}
?>
