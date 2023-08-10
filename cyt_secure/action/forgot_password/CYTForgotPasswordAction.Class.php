<?php 

/**
 * Acción para solicitar una nueva clave.
 * 
 * @author Marcos
 * @since 07-11-2013
 * 
 */
class CYTForgotPasswordAction extends CdtAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){
		
		$ds_email = CdtUtils::getParamPOST('ds_email');
		
		try{
			
			$manager = CYTSecureManagerFactory::getUserManager();
			$manager->sendNewPassword( $ds_email );
			
			$forward = 'forgot_password_success';
			
		}catch(GenericException $ex){
			
			CdtDbManager::undo();
			$forward = $this->doForwardException( $ex, 'forgot_password_error' );			
		}
		
		
		return $forward;
	}
	
}