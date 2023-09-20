<?php

/**
 * Factory para componentes
 *
 * @author Marcos
 * @since 12-11-2013
 */

class CYTSecureComponentsFactory {


	
	
	public static function getFindLugarTrabajo(LugarTrabajo $lugarTrabajo, $label, $required_msg="", $inputId='lugarTrabajo_oid', $inputName='lugarTrabajo.oid', $fCallback="lugarTrabajo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($lugarTrabajo->getOid(), $label, $inputId, $inputName, self::getAutocompleteLugarTrabajo($lugarTrabajo), get_class(CYTSecureManagerFactory::getLugarTrabajoManager()), "CMPLugarTrabajoPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_unidad,ds_sigla');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	
	
	public static function getAutocompleteLugarTrabajo(LugarTrabajo $lugarTrabajo, $required_msg="", $inputId='autocomplete_lugarTrabajo', $inputName='autocomplete_lugarTrabajo', $fCallback="autocomplete_lugarTrabajo_change") {

		$autocomplete = new CMPLugarTrabajoAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindTitulo(Titulo $titulo, $label, $required_msg="", $inputId='titulo_oid', $inputName='titulo.oid', $fCallback="titulo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($titulo->getOid(), $label, $inputId, $inputName, self::getAutocompleteTitulo($titulo), get_class(CYTSecureManagerFactory::getTituloManager()), "CMPTituloPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_titulo');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}
	
	public static function getFindTituloWithAdd(Titulo $titulo, $label, $required_msg="", $inputId='titulo_oid', $inputName='titulo.oid', $fCallback="titulo_change") {

		$oFindEntity = self::getFindTitulo($titulo, $label, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_titulo_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva localidad");
		return $oFindEntity;
	}

	
	
	public static function getAutocompleteTitulo(Titulo $titulo, $required_msg="", $inputId='autocomplete_titulo', $inputName='autocomplete_titulo', $fCallback="autocomplete_titulo_change") {

		$autocomplete = new CMPTituloAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		//$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	
	public static function getFindTituloPosgrado(Titulo $titulo, $label, $required_msg="", $inputId='titulo_oid', $inputName='titulo.oid', $fCallback="titulo_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($titulo->getOid(), $label, $inputId, $inputName, self::getAutocompleteTituloPosgrado($titulo), get_class(CYTSecureManagerFactory::getTituloManager()), "CMPTituloPosgradoPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_titulo');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}
	
	public static function getFindTituloPosgradoWithAdd(Titulo $titulo, $label, $required_msg="", $inputId='titulo_oid', $inputName='titulo.oid', $fCallback="titulo_change") {

		$oFindEntity = self::getFindTituloPosgrado($titulo, $label, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_titulo_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva localidad");
		return $oFindEntity;
	}
	
	public static function getAutocompleteTituloPosgrado(Titulo $titulo, $required_msg="", $inputId='autocomplete_titulo', $inputName='autocomplete_titulo', $fCallback="autocomplete_titulo_change") {

		$autocomplete = new CMPTituloPosgradoAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		//$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}

	
	
	public static function getFindUniversidad(Universidad $universidad, $label, $required_msg="", $inputId='universidad_oid', $inputName='universidad.oid', $fCallback="universidad_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($universidad->getOid(), $label, $inputId, $inputName, self::getAutocompleteUniversidad($universidad), get_class(CYTSecureManagerFactory::getUniversidadManager()), "CMPUniversidadPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_universidad');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}
	
	public static function getFindUniversidadWithAdd(Universidad $universidad, $required_msg="", $inputId='universidad_oid', $inputName='universidad.oid', $fCallback="universidad_change") {

		$oFindEntity = self::getFindUniversidad($universidad, $required_msg, $inputId, $inputName, $fCallback);
		$oFindEntity->getInput()->setAddEntityAction("add_universidad_popup_init");
		//$oFindEntity->getInput()->setTitleAddEntity("Agregar nueva localidad");
		return $oFindEntity;
	}

	
	
	public static function getAutocompleteUniversidad(Universidad $universidad, $required_msg="", $inputId='autocomplete_universidad', $inputName='autocomplete_universidad', $fCallback="autocomplete_universidad_change") {

		$autocomplete = new CMPUniversidadAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindSolicitud(Solicitud $solicitud, $label, $required_msg="", $inputId='solicitud_oid', $inputName='solicitud.oid', $fCallback="solicitud_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($solicitud->getOid(), $label, $inputId, $inputName, self::getAutocompleteSolicitud($solicitud), get_class(ManagerFactory::getSolicitudManager()), "CMPSolicitudPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,docente.ds_apellido,docente.ds_nombre');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	
	
	public static function getAutocompleteSolicitud(Solicitud $solicitud, $required_msg="", $inputId='autocomplete_solicitud', $inputName='autocomplete_solicitud', $fCallback="autocomplete_solicitud_change") {

		$autocomplete = new CMPSolicitudAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		//$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindEvaluacion(Evaluacion $evaluacion, $label, $required_msg="", $inputId='evaluacion_oid', $inputName='evaluacion.oid', $fCallback="evaluacion_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($evaluacion->getOid(), $label, $inputId, $inputName, self::getAutocompleteEvaluacion($evaluacion), get_class(ManagerFactory::getEvaluacionManager()), "CMPEvaluacionPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,user.ds_username');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	
	
	public static function getAutocompleteEvaluacion(Evaluacion $evaluacion, $required_msg="", $inputId='autocomplete_evaluacion', $inputName='autocomplete_evaluacion', $fCallback="autocomplete_evaluacion_change") {

		$autocomplete = new CMPEvaluacionAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	
	
	public static function getFindEvaluador(User $evaluador, $label, $required_msg="", $inputId='evaluador_oid', $inputName='evaluador.oid', $fCallback="evaluador_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($evaluador->getOid(), $label, $inputId, $inputName, self::getAutocompleteEvaluador($evaluador), get_class(CYTSecureManagerFactory::getEvaluadorManager()), "CMPEvaluadorPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_name');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	
	
	public static function getAutocompleteEvaluador(User $evaluador, $required_msg="", $inputId='autocomplete_evaluador', $inputName='autocomplete_evaluador', $fCallback="autocomplete_evaluador_change") {
		
		$autocomplete = new CMPEvaluadorAutocomplete();
		

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	public static function getFindRendicion(Rendicion $rendicion, $label, $required_msg="", $inputId='rendicion_oid', $inputName='rendicion.oid', $fCallback="rendicion_change") {

		$findEntityInput = FieldBuilder::buildFieldFindEntity ($rendicion->getOid(), $label, $inputId, $inputName, self::getAutocompleteRendicion($rendicion), get_class(ManagerFactory::getRendicionManager()), "CMPRendicionPopupGrid" , $required_msg );
		$findEntityInput->getInput()->setFunctionCallback($fCallback);		
		$findEntityInput->getInput()->setItemAttributesCallback('oid,ds_investigador');

		$findEntityInput->getInput()->setInputSize(5,25);
		
		return $findEntityInput;
		
	}

	
	
	public static function getAutocompleteRendicion(Rendicion $rendicion, $required_msg="", $inputId='autocomplete_rendicion', $inputName='autocomplete_rendicion', $fCallback="autocomplete_rendicion_change") {

		$autocomplete = new CMPRendicionAutocomplete();

		$autocomplete->setFunctionCallback( $fCallback );
		$autocomplete->setInputSize( $inputSize );
		$autocomplete->setInputName( $inputName );
		$autocomplete->setInputId(  $inputId );
			
		return $autocomplete;
	}
	
	
}
?>