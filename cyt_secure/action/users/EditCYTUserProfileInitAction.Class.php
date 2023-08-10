<?php 

/**
 * Acción para inicializar el contexto para modificar
 * datos del usuario logueado.
 *  
 * @author Marcos
 * @since 11-11-2013
 *  
 */
class EditCYTUserProfileInitAction extends CdtEditInitAction{

	/**
	 * (non-PHPdoc)
	 * @see EditInitAction::getXTemplate();
	 */
	protected function getXTemplate(){
		return new XTemplate ( CDT_SECURE_TEMPLATE_CDTUSERPROFILE_EDIT );		
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see EditInitAction::getEntity();
	 */
	protected function getEntity(){

		$oUser = null;

		//recuperamos el usuario logueado.
		$cd_User = CdtUtils::getParamPOST('cd_user');
			
		if (empty( $cd_User )) {

			$oUser = CYTSecureUtils::getUserLogged();
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('oid', $oUser->getOid(), '=');
			
			$manager = CYTSecureManagerFactory::getUserManager();
			$oUser = $manager->getEntity( $oCriteria );
			
		}else{
		
			//TODO tomamos los datos editados.
		
		
				//se construye el CdtUser a modificar.
				$oUser = new User ( );
			
				$oUser->setCd_user ( CdtUtils::getParamPOST('cd_user') );	
						
				$oUser->setDs_username ( CdtUtils::getParamPOST('ds_username') );	
						
				$oUser->setDs_name ( CdtUtils::getParamPOST('ds_name') );	
						
				$oUser->setDs_email ( CdtUtils::getParamPOST('ds_email') );	
						
				$oUser->setDs_password ( CdtUtils::getParamPOST('ds_password') );	
						
				//$oUser->setCd_usergroup ( CdtUtils::getParamPOST('cd_usergroup') );	
						
				$oUser->setDs_phone ( CdtUtils::getParamPOST('ds_phone') );	
						
				$oUser->setDs_address ( CdtUtils::getParamPOST('ds_address') );	
				
				$oFacultad = new Facultad();
				$oFacultad->setOid(CdtUtils::getParamPOST('facultad_oid') );
				$oUser->setFacultad ( $oFacultad );	
		}
		return $oUser ;
	}

	/**
	 * (non-PHPdoc)
	 * @see EditUserInitAction::getSubmitAction();
	 */
	protected function getSubmitAction(){
		return "edit_cdtuserprofile";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see EditInitAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CDT_SECURE_MSG_CDTUSERPROFILE_TITLE_UPDATE;
	}

	protected function parseEntity($entity, XTemplate $xtpl){
		
		$oUser = CdtFormatUtils::ifEmpty($entity, new User());

		//parseamos la entity
		
				
		$xtpl->assign ( 'ds_name', stripslashes ( $oUser->getDs_name () ) );
		$xtpl->assign ( 'ds_name_label', CDT_SECURE_LBL_CDTUSER_DS_NAME );
				
		$xtpl->assign ( 'ds_email', stripslashes ( $oUser->getDs_email () ) );
		$xtpl->assign ( 'ds_email_label', CDT_SECURE_LBL_CDTUSER_DS_EMAIL );
		$xtpl->assign ( 'ds_email_required', '*' );
		$xtpl->assign ( 'ds_email_required_msg', CDT_SECURE_MSG_CDTUSER_DS_EMAIL_REQUIRED );
		$xtpl->assign ( 'ds_email_invalid_msg', CDT_SECURE_MSG_EMAIL_INVALID );
				
		$xtpl->assign ( 'ds_phone', stripslashes ( $oUser->getDs_phone () ) );
		$xtpl->assign ( 'ds_phone_label', CDT_SECURE_LBL_CDTUSER_DS_PHONE );
				
		$xtpl->assign ( 'ds_address', stripslashes ( $oUser->getDs_address () ) );
		$xtpl->assign ( 'ds_address_label', CDT_SECURE_LBL_CDTUSER_DS_ADDRESS );
		
		
				
		$xtpl->assign ( 'cd_user', stripslashes ( $oUser->getOid () ) );
		$xtpl->assign ( 'cd_user_label', CDT_SECURE_LBL_CDTUSER_CD_USER );
		$xtpl->assign ( 'cd_user_required', '*' );
		$xtpl->assign ( 'cd_user_required_msg', CDT_SECURE_MSG_CDTUSER_CD_USER_REQUIRED );
				
		$xtpl->assign ( 'ds_username', stripslashes ( $oUser->getDs_username () ) );
		$xtpl->assign ( 'ds_username_label', CDT_SECURE_LBL_CDTUSER_DS_USERNAME );
		$xtpl->assign ( 'ds_username_required', '*' );
		$xtpl->assign ( 'ds_username_required_msg', CDT_SECURE_MSG_CDTUSER_DS_USERNAME_REQUIRED );
		
		$xtpl->assign ( 'facultad_oid',  ( $oUser->getFacultad()->getOid () ) );
		
		//parseamos las relaciones de la entity
		
		/*$xtpl->assign ( 'cd_usergroup_label', CDT_SECURE_LBL_CDTUSER_CD_USERGROUP );
		$xtpl->assign ( 'cd_usergroup_required', '*' );
		$selected =  $oUser->getUserGroup()->getCd_usergroup();
		
		
		$this->parseCdtUserGroup($selected, $xtpl);*/
				

		//ips
		/*$xtpl->assign ( 'ips_title', stripslashes ( CDT_SECURE_MSG_CDTUSER_IP_TITLE ) );
		$xtpl->assign ( 'msg_delete_ip', CDT_SECURE_MSG_CDTUSER_IP_DELETE );
		$xtpl->assign ( 'msg_add_ip', CDT_SECURE_MSG_CDTUSER_IP_ADD );
		$xtpl->assign ( 'ip_invalid_msg', CDT_SECURE_MSG_CDTUSER_IP_INVALID );
		$xtpl->assign ( 'msg_confirm_delete_ip', CDT_SECURE_MSG_CDTUSER_IP_DELETE_CONFIRM );
		$xtpl->assign ( 'ds_ip_label', CDT_SECURE_LBL_CDTUSER_DS_IPS );
		
		$this->parseIPs($oUser, $xtpl);*/
		
		
		//parseamos el action submit.
		$xtpl->assign('submit',  $this->getSubmitAction() );
		
		$xtpl->assign ( 'lbl_save', CDT_SECURE_LBL_SAVE);
		$xtpl->assign ( 'lbl_cancel', CDT_SECURE_LBL_CANCEL);
		$xtpl->assign ( 'msg_required_fields', CDT_SECURE_MSG_REQUIRED_FIELDS);
		
		$xtpl->assign ( 'ds_password_label', CDT_SECURE_LBL_CDTUSER_DS_PASSWORD );
		$xtpl->assign ( 'ds_new_password_label', CDT_SECURE_LBL_CDTUSER_DS_NEW_PASSWORD );
		$xtpl->assign ( 'ds_repeat_new_password_label', CDT_SECURE_LBL_CDTUSER_DS_REPEAT_NEW_PASSWORD );
		
		$xtpl->assign ( 'invalid_passwords', CDT_SECURE_MSG_PASSWORDS_INVALID );
		
		$xtpl->assign ( 'ds_password_label', CDT_SECURE_LBL_CDTUSER_DS_PASSWORD );
		$xtpl->assign ( 'ds_new_password_label', CDT_SECURE_LBL_CDTUSER_DS_NEW_PASSWORD );
		$xtpl->assign ( 'ds_repeat_new_password_label', CDT_SECURE_LBL_CDTUSER_DS_REPEAT_NEW_PASSWORD );
		
		$xtpl->assign ( 'invalid_passwords', CDT_SECURE_MSG_PASSWORDS_INVALID );
		
		
	}
}
