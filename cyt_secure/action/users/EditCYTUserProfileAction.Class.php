<?php 

/**
 * Acción para modificar la cuenta del usuario..
 * 
 * @author Marcos
 * @since 11-11-2013
 *  
 */
class EditCYTUserProfileAction extends CdtEditAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se construye el CdtUser a modificar.
		$oUser = new User( );
		
		$oUser->setOid( CdtUtils::getParamPOST('cd_user') );	
				
		$oUser->setDs_username ( CdtUtils::getParamPOST('ds_username') );	
				
		$oUser->setDs_name ( CdtUtils::getParamPOST('ds_name') );	
				
		$oUser->setDs_email ( CdtUtils::getParamPOST('ds_email') );	
				
		$oUser->setDs_password ( CdtUtils::getParamPOST('ds_password') );	
				
		//$oUser->setCd_usergroup ( CdtUtils::getParamPOST('cd_usergroup') );	
				
		$oUser->setDs_phone ( CdtUtils::getParamPOST('ds_phone') );	
				
		$oUser->setDs_address ( CdtUtils::getParamPOST('ds_address') );	
		
		$ips = unserialize($_SESSION["cdtuser_ips"]);
        
		if ($ips) {
			$oUser->setDs_ips( implode(",", $ips));
		}
        
		
		$ds_new_password = CdtUtils::getParamPOST('ds_new_password') ;	

		$oFacultad = new Facultad();
		$oFacultad->setOid(CdtUtils::getParamPOST('facultad_oid') );
		$oUser->setFacultad ( $oFacultad );	
		
				
					
		return array( "user" => $oUser, "password" => $ds_new_password );
	}
		
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit($oEntity){
		$manager = CYTSecureManagerFactory::getUserManager();
		$manager->updateCYTUserProfile( $oEntity["user"], $oEntity["password"] );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'edit_cdtuserprofile_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'edit_cdtuserprofile_error';
	}

	
}
