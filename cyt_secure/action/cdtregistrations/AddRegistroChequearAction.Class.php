<?php

/**
 * Se chequea si un matriculado está cargado
 * 
 * @author Marcos
 * @since 28-10-2013
 *
 */
class AddRegistroChequearAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			
			$documento = CdtUtils::getParam("documento");
			
			$valido = true; //TODO validar
			
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nu_documento', $documento, '=');
			
			$managerDocente =  CYTSecureManagerFactory::getDocenteManager();
			$oDocente = $managerDocente->getEntity($oCriteria);
			if (empty($oDocente)) {
				$valido=false;
				$mensajes=CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_ERROR;
			}
			else $mensajes=CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_1.' '.$oDocente->getDs_apellido().', '.$oDocente->getDs_nombre().' '.CYT_SECURE_MSG_REGISTRATION_SOLICITANTE_CONTROL_2;
			
			
				
			$result['valido'] = $valido;
			$result['mensajes'] = $mensajes;
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}