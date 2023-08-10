<?php

/**
 * Acción para registrarse en el sistema.
 * 
 * @author Marcos
 * @since 05-11-2011
 * 
 */
class ActivateCYTRegistrationAction extends ActivateCdtRegistrationAction {

    /**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute() {


        $ds_activationCode = CdtUtils::getParam('activationcode');

        try {

            CdtDbManager::begin_tran();

            $manager = CYTSecureManagerFactory::getUserManager();
            $manager->activateRegistration( $ds_activationCode );
            $forward = 'activate_registration_success';

            CdtDbManager::save();
            //DbManager::close();
        } catch (GenericException $ex) {
            CdtDbManager::undo();
            //DbManager::close();
            $_POST['title'] = CDT_SECURE_MSG_REGISTRATION_SIGNUP_TITLE;
            $forward = $this->doForwardException($ex, 'activate_registration_error');
        }



        return $forward;
    }



}