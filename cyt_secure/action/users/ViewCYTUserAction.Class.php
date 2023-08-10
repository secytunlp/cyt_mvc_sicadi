<?php

/**
 * Acción para visualizar un usuario.
 *
 * @author Marcos
 * @since 11-11-2013
 *
 */
class ViewCYTUserAction extends UpdateCYTUserInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout() {
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}

	
	

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle() {
		return CDT_SECURE_MSG_CDTUSER_TITLE_VIEW;
	}

	
}