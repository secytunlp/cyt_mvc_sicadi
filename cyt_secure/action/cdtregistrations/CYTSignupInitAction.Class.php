<?php 

/**
 * Acción para iniciarlizar el registro en el sistema.
  * 
 * @author Marcos
 * @since 05-11-2013
 * 
 */
class CYTSignupInitAction extends CdtOutputAction{

	/**
	 * 
	 */
	protected function getEntity(){
		
		$oUser = new User( );
		
		//$oUser->setDs_username ( CdtUtils::getParamPOST('nu_precuil').'-'.CdtUtils::getParamPOST('nu_documento').'-'.CdtUtils::getParamPOST('nu_postcuil') ) ;

        $oUser->setDs_username  (  CdtUtils::getParamPOST('ds_username') ) ;

		$oUser->setDs_email (  CdtUtils::getParamPOST('ds_email') ) ;
		$oFacultad = new Facultad();
		$oFacultad->setOid(CdtUtils::getParamPOST('facultad_oid'));
		$oUser->setFacultad (  $oFacultad ) ;
		$oUser->setDs_name(  CdtUtils::getParamPOST('ds_name') ) ;
		return $oUser;
	}
		
	/**
	 * 
	 */
	protected function parseEntity($entity , XTemplate $xtpl){
		
		$oUser = CdtFormatUtils::ifEmpty($entity, new User());

		
		$xtpl->assign ( 'lbl_username', CDT_SECURE_LBL_CDTREGISTRATION_DS_USERNAME );
		/*$separarCUIL = explode('-',trim($oUser->getDs_username()));

		$preCuil = $separarCUIL[0]; 
		$documento = $separarCUIL[1]; 
		$posCuil = $separarCUIL[2]; 
		
		$xtpl->assign ( 'nu_precuil', stripslashes ( $preCuil ) );
		$xtpl->assign ( 'nu_documento', stripslashes ( $documento ) );
		$xtpl->assign ( 'nu_postcuil', stripslashes ( $posCuil ) );*/

        $xtpl->assign ( 'ds_username', stripslashes ( $oUser->getDs_username () ) );

		$xtpl->assign ( 'lbl_name', CDT_SECURE_LBL_CDTREGISTRATION_DS_NAME );
		$xtpl->assign ( 'ds_name', stripslashes ( $oUser->getDs_name () ) );
		
		$xtpl->assign ( 'lbl_email', CDT_SECURE_LBL_CDTREGISTRATION_DS_EMAIL );
		$xtpl->assign ( 'ds_email', stripslashes ( $oUser->getDs_email () ) );
		
		$xtpl->assign ( 'lbl_facultad', CYT_LBL_FACULTAD );
		
		$facultades=CYTSecureUtils::getFacultadesItems('165,167,168,169,170,171,172,173,174,175,176,177,179,180,181,187,1220');


        foreach ($facultades as $cd_facultad => $ds_facultad) {

            $xtpl->assign('ds_facultad', $ds_facultad);
            //$xtpl->assign('cd_facultad', $cd_facultad);
            $xtpl->assign('cd_facultad', $cd_facultad.' '.CdtFormatUtils::selected($cd_facultad, $oUser->getFacultad()->getOid()));

            $xtpl->parse('main.facultad');
        }
		
		

		$xtpl->assign ( 'lbl_password', CDT_SECURE_LBL_CDTREGISTRATION_DS_PASSWORD );
		
		
		$xtpl->assign ( 'lbl_securitycode', CDT_SECURE_MSG_SECURITYCODE );
		$xtpl->assign ( 'lbl_repeat_password', CDT_SECURE_MSG_REPEAT_PASSWORD );
		
		$xtpl->assign ( 'debe_leer_terminos', CDT_SECURE_MSG_READ_TERMS );
		$xtpl->assign ( 'fill_username', CDT_SECURE_MSG_USERNAME_REQUIRED );
		$xtpl->assign ( 'fill_name', CDT_SECURE_MSG_NAME_REQUIRED );
		$xtpl->assign ( 'fill_password', CDT_SECURE_MSG_PASSWORD_REQUIRED );
		$xtpl->assign ( 'fill_security_code', CDT_SECURE_MSG_SECURITYCODE_REQUIRED );
		
		$xtpl->assign ( 'invalid_email', CDT_SECURE_MSG_EMAIL_INVALID );
		$xtpl->assign ( 'ingrese_password', CDT_SECURE_MSG_PASSWORD_REQUIRED );
		$xtpl->assign ( 'passwords_incorrectas', CDT_SECURE_MSG_PASSWORDS_INCORRECTAS );
		$xtpl->assign ( 'cambiar_imagen', CDT_SECURE_MSG_RELOAD_IMAGE );
		
		$xtpl->assign ( 'btn_register_label', CDT_SECURE_LBL_BTN_REGISTER );
		$xtpl->assign ( 'btn_cancel_label', CDT_UI_LBL_CANCEL );
		$xtpl->assign ( 'required_fields', CDT_SECURE_MSG_REQUIRED_FIELDS );
		
		$xtpl->assign ( 'txt_terms_accept', CDT_SECURE_MSG_REGISTRATION_TERMS_ACCEPT );
		$xtpl->assign ( 'txt_terms_title', CDT_SECURE_MSG_REGISTRATION_TERMS_TITLE );
		
		$xtpl->assign ( 'sid_captcha', md5(time()) );
		
	}
	
	protected function getOutputTitle(){
		return CDT_SECURE_MSG_REGISTRATION_SIGNUP_TITLE;
	}
	
	/**
	 * @return forward.
	 */
	protected function getOutputContent(){
		$oEntidad = $this->getEntity();
		$xtpl = $this->getXTemplate();
		
			
		 	
		$xtpl->assign ( 'WEB_PATH', WEB_PATH );
		
		$this->parseEntity( $oEntidad , $xtpl);
		
			
		if( CdtUtils::hasRequestError() ){
			
			$error = CdtUtils::getRequestError();
			
			$xtpl->assign ( 'classMsj', 'msjerror' );
			$xtpl->assign ( 'msg', $error["msg"] );
			$xtpl->parse ( 'main.msg' );
			
		}
		
		
		
		$xtpl->assign ( 'registrarse_titulo', CDT_SECURE_REGISTRARSE_TITULO );
		$xtpl->assign ( 'registrarse_subtitulo', CDT_SECURE_REGISTRARSE_SUBTITULO );
		
		$xtpl->assign ( 'titulo', $this->getOutputTitle() );
		
		$xtpl->parse ( 'main' );
		
		return $xtpl->text ( 'main' );		
		
	}
	

	protected function getLayout(){
		$oClass = new ReflectionClass( CDT_SECURE_REGISTRATION_LAYOUT );
		$oLayout = $oClass->newInstance();
		
		return $oLayout;
	}
	
	public function getXTemplate(){
		return new XTemplate ( CDT_SECURE_TEMPLATE_REGISTRATION_SIGNUP );		
	}
	
}