<?php

/**
 * Formulario para Asignar Evaluadores
 *
 * @author Marcos
 * @since 13-05-2014
 */
class CMPEvaluadoresForm extends CMPForm{

	/**
	 * se construye el formulario para editar los evaluadores
	 */
	public function __construct($action="", $id="edit_evaluadores") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findSolicitud = CYTSecureComponentsFactory::getFindSolicitud(new Solicitud(), CYT_LBL_SOLICITUD, "", "evaluacion_filter_solicitud_oid", "solicitud.oid", "solicitud_filter_evaluador_change");
		$fieldset->addField( $findSolicitud );

		$findEvaluador = CYTSecureComponentsFactory::getFindEvaluador(new User(), CYT_LBL_EVALUADOR_INTERNO, "", "evaluacion_filter_evaluadorInterno_oid", "evaluadorInterno.oid", "");
		$fieldset->addField( $findEvaluador );
		
		$findEvaluador = CYTSecureComponentsFactory::getFindEvaluador(new User(), CYT_LBL_EVALUADOR_EXTERNO, "", "evaluacion_filter_evaluadorExterno_oid", "evaluadorExterno.oid", "");
		$fieldset->addField( $findEvaluador );
		
		/*$findEvaluador = CYTSecureComponentsFactory::getFindEvaluador(new User(), CYT_LBL_EVALUADOR_TERCERO, "", "evaluacion_filter_evaluadorTercero_oid", "evaluadorTercero.oid", "");
		
		$fieldset->addField( $findEvaluador );*/
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_evaluaciones';");
		$this->setUseAjaxSubmit( true );
		$this->setCustomHTML("");
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
