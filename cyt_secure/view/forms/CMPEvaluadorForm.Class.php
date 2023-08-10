<?php

/**
 * Formulario para Agregar Evaluador
 *
 * @author Marcos
 * @since 09-04-2018
 */
class CMPEvaluadorForm extends CMPForm{

	/**
	 * se construye el formulario para editar los evaluadores
	 */
	public function __construct($action="", $id="edit_evaluador") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findSolicitud = CYTSecureComponentsFactory::getFindSolicitud(new Solicitud(), CYT_LBL_SOLICITUD, CYT_MSG_EVALUACION_SOLICITUD_REQUIRED, "evaluacion_filter_solicitud_oid", "solicitud.oid", "solicitud_filter_evaluador_change1");
		$fieldset->addField( $findSolicitud );

		
		$fieldset->addField( FieldBuilder::buildFieldCheckbox ( CYT_LBL_INTERNO, "bl_interno", "bl_interno") );
		
		
		$findEvaluador = CYTSecureComponentsFactory::getFindEvaluador(new User(), CYT_LBL_EVALUADOR, CYT_MSG_EVALUACION_EVALUADOR_REQUIRED, "evaluacion_filter_evaluador_oid", "evaluador.oid", "");
		$fieldset->addField( $findEvaluador );
		
		
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_evaluaciones';");
		$this->setUseAjaxSubmit( true );
		$this->setCustomHTML("<script>$(document).ready(function() {
   

    $('#bl_interno').click(function() {
        if (!$(this).is(':checked')) {
            bl_interno_click(0);
        }
        else{
			bl_interno_click(1);
		}
    });
});</script>");
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
