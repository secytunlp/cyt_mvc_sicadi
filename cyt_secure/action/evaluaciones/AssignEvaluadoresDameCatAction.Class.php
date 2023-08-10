<?php

/**
 * Se solicita la cat de la facultad de la solicitud
 * 
 * @author Marcos
 * @since 15-05-2014
 *
 */
class AssignEvaluadoresDameCatAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = "";
		
		try{
			
			$solicitud_oid = CdtUtils::getParam("solicitud_oid");
			$managerSolicitud = ManagerFactory::getSolicitudManager();
			$oSolicitud = $managerSolicitud->getObjectByCode($solicitud_oid);
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_facultad', $oSolicitud->getFacultadplanilla()->getOid(), '=');
			$managerFacultadManager =  CYTSecureManagerFactory::getFacultadManager();
			$oFacultad = $managerFacultadManager->getEntity($oCriteria);
			
			$result['facultad'] = $oFacultad->getOid();
			$result['cat'] = $oFacultad->getCat()->getOid();
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}