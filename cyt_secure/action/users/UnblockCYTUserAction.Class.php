<?php

/**
 * Acción para desbloquear un Usuario.
 * 
 * @author Marcos
 * @since 11-11-2013
 * 
 */
class UnblockCYTUserAction extends CdtEditAction {

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		//se obtiene el id del usuario a desbloquear.
		return CdtUtils::getParam('id');
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $oEntity ){
		$manager = CYTSecureManagerFactory::getUserManager();
		$manager->unblockCYTUser( $oEntity );
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		$this->setDs_forward_params("search=1");
		return 'unblock_cdtuser_success';
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		$_GET["search"] = 1;
		return 'unblock_cdtuser_error';
	}


}
