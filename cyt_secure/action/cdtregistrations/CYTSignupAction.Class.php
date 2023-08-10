<?php 

/**
 * Acción para registrarse en el sistema.
 * 
 * @author Marcos
 * @since 05-11-2011
 * 
 */
class CYTSignupAction extends CdtSignupAction{

	/**
	 * se registra el usuario en el sistema.
	 * @return forward.
	 */
	public function execute(){
			

		
		try{
            $oUser = $this->getEntity();
			CdtDbManager::begin_tran();
			
			$oManager = CYTSecureManagerFactory::getUserManager();
			$oManager->signup( $oUser );
			
			$forward = 'signup_success';
			
			CdtDbManager::save();
			
		}catch(GenericException $ex){
			CdtDbManager::undo();
			$forward = $this->doForwardException( $ex, 'signup_error' );					
		}

		
		
		return $forward;
	}
	
	protected function getEntity(){
        $pass = CdtUtils::getParamPOST('ds_password');
        $pass2 = CdtUtils::getParamPOST('pass2');
        if ($pass!=$pass2){
            throw new GenericException( CDT_SECURE_MSG_PASSWORDS_INVALID);
        }
		$oUser = new User ( );
		
		//$oUser->setDs_username( CdtUtils::getParamPOST('nu_precuil').'-'.CdtUtils::getParamPOST('nu_documento').'-'.CdtUtils::getParamPOST('nu_postcuil') ) ;
        $oUser->setDs_username (  CdtUtils::getParamPOST('username') ) ;
		$oUser->setDs_name (  CdtUtils::getParamPOST('ds_name') ) ;
		$oUser->setDs_email (  CdtUtils::getParamPOST('ds_email') ) ;
		
		
		$oUser->setDs_password (  CdtUtils::getParamPOST('ds_password') ) ;
		$oFacultad = new Facultad();
		$oFacultad->setOid(CdtUtils::getParamPOST('facultad_oid') );
		$oUser->setFacultad($oFacultad);
		
		return $oUser;
	}	
	
}