<?php

/**
 * Manager para User
 *  
 * @author Marcos
 * @since 10-11-2013
 */
class UserManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getUserDAO();
	}

	public function signup( User $oUser ){
				
		//chequeamos el captcha.
		//TODO ver cómo mejorarlo.
		
		include("libs/captcha/securimage.php");
		$img = new Securimage();
		$valid = $img->check(CdtUtils::getParamPOST('captcha'));
		if(!$valid)
			throw new CaptchaException();
		
		CdtUtils::log_debug( "signup 1 ");
		
		//creamos la registración
		$oRegistration = new CYTRegistration();
		
		$oRegistration->setDs_username( $oUser->getDs_username() );
		$oRegistration->setDs_name( $oUser->getDs_name() );
		$oRegistration->setDs_password( md5($oUser->getDs_password()) ); 
		$oRegistration->setDs_email( $oUser->getDs_email() );
		$oRegistration->setFacultad( $oUser->getFacultad() );
		
		CdtUtils::log_debug( "signup 2 ");
		
		$oManager = CYTSecureManagerFactory::getRegistrationManager();
		$oManager->add( $oRegistration );
		
				
	}	
	
	
	public function add(Entity $entity, $sendEmail=true) {
    	
		//generamos la clave
		if ($sendEmail) {
			$newPassword =  CdtUtils::textoRadom(8) ;
			$entity->setDs_password ( md5( $newPassword ) );
		}
		
		
		parent::add($entity);
		
		
		
		//usergroups
		$usergroups = $entity->getUsergroups();
		foreach ($usergroups as $oUserGroup) {
			$oUserGroup->setUser( $entity );
			
			$managerUserUserGroup = CYTSecureManagerFactory::getUserUserGroupManager();
			$managerUserUserGroup->add($oUserGroup);
			
		}
		
		//$sendEmail=false;
		//enviamos el email al nuevo usuario.
		$emailTo = $entity->getDs_email();
		if( $sendEmail && !empty( $emailTo ) ){
			
			$nameTo = $entity->getDs_name();
			
			//template
			if( empty( $xtpl)  )
				$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_MAIL_NEW_USER );
			
			//armamos el email.
			$bodyEmail = $this->buildNewUserEmail($entity, $newPassword, $xtpl );
			
			//subject
			if(empty($subject))
        		$subject = CDT_SECURE_MSG_NEW_USER_MAIL_SUBJECT;
        
        	//enviamos el mail.
			CYTSecureUtils::sendMail($nameTo, $emailTo, $subject, $bodyEmail);
		}
		
		
		
		
    }	
    
	private function buildNewUserEmail( User $oUser, $newPassword, XTemplate $xtpl ){
        $xtpl->assign ( 'img_logo', WEB_PATH.'css/images/image002.gif' );
		$xtpl->assign('CDT_MVC_APP_SUBTITLE', htmlspecialchars(CDT_MVC_APP_SUBTITLE));
		$xtpl->assign('WEB_PATH', WEB_PATH);
        $xtpl->assign('ds_name', htmlspecialchars($oUser->getDs_name()));
    	$xtpl->assign('ds_username', $oUser->getDs_username());
    	$xtpl->assign('ds_password', $newPassword );
    	
        $xtpl->parse('main');
        return $xtpl->text('main');
    }
    
    
    
     public function update(Entity $entity, $validar=true) {
		
     	
		if ($validar) {
			$this->validateOnUpdate( $entity );
		}
		
    	
        //persistir en la bbdd.
        $this->getDAO()->updateEntity($entity);
		
        if ($validar) {
	     	$oUserUserGroupAO =  CYTSecureDAOFactory::getUserUserGroupDAO();
	        $oUserUserGroupAO->deleteUserUserGroupForUser($entity->getOid());
	        
	     	//usergroups
			$usergroups = $entity->getUsergroups();
			foreach ($usergroups as $oUserGroup) {
				$oUserGroup->setUser( $entity );
				
				$managerUserUserGroup = CYTSecureManagerFactory::getUserUserGroupManager();
				$managerUserUserGroup->add($oUserGroup);
				
			}
        }
     }

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        
    	$oUserUserGroupAO =  CYTSecureDAOFactory::getUserUserGroupDAO();
        $oUserUserGroupAO->deleteUserUserGroupForUser($id);
		parent::delete( $id );
		
    	
    }
    

    
	/**
	 * se recupera un usuario por nombre y password.
	 * @param string $username nombre de usuairo
	 * @param string $password clave del usuario
	 * @return CdtUser
	 */
	public function getUserByUsernamePassword($username, $password, $userGroup_oid, $ip=''){
		
		//recuperamos el usuario por su nombre.
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_username', $username, '=', new CdtCriteriaFormatStringValue());
		
		//$oUserManager = CYTSecureManagerFactory::getUserManager();
		$oUser = $this->getEntity($oCriteria);
		
		if( $oUser == null )
			throw new GenericException( CDT_SECURE_MSG_INVALID_USER );
		
		
		//si está limitado por ip, hacemos el control.
		$ipsStr = $oUser->getDs_ips();
		if(!empty($ipsStr)){
			$ips = explode(",", $ipsStr);
			$exists = false;
    		foreach ($ips as $value) {
    			if( $value == $ip ){
    				$exists = true;
    			}
    		}
    		if( !$exists ){
    			throw new GenericException( CDT_SECURE_MSG_INVALID_IP . $_SERVER[ 'REMOTE_ADDR']);
    		}
		}
		
		//vemos si está bloqueado (dado por la cantidad de intentos)
		if( $oUser->getNu_attemps() == CDT_SECURE_LOGIN_MAX_ATTEMPS )
			throw new GenericException( CDT_SECURE_MSG_USER_BLOCKED );
			
		//vemos si coincide la clave ingresada.
		$password = md5 ( $password );
		if( $password != $oUser->getDs_password() ){
			
			//incrementamos los intentos del usuario
			$oUser->setNu_attemps( $oUser->getNu_attemps() + 1 );
			$this->update($oUser, false);
			$chances = CDT_SECURE_LOGIN_MAX_ATTEMPS - $oUser->getNu_attemps();
			
			if( $chances == 1 )
				$msg = CDT_SECURE_MSG_INVALID_PASSWORD_LAST_CHANCE;
			elseif( $chances == 0 )
				$msg = CDT_SECURE_MSG_USER_BLOCKED ;
			else		 
				$msg = CdtFormatUtils::formatMessage( CDT_SECURE_MSG_INVALID_PASSWORD, array($chances) );
			throw new GenericException( $msg );
		}
		
		$oUserGroup = new CdtUserGroup();
		$oUserGroup->setCd_usergroup($userGroup_oid);
		
		$oUser->setUserGroup($oUserGroup);
		
		//buscamos las funciones que puede realizar el usuario.
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_usergroup',$userGroup_oid, '=');
		
		$oUserGroupFunctionManager = CYTSecureManagerFactory::getUserGroupFunctionManager();
		$oUserGroupFunctions = $oUserGroupFunctionManager->getEntities($oCriteria);
		$funciones = new ItemCollection();
    	foreach ($oUserGroupFunctions as $oUserGroupFunction) {
    		$funciones->addItem($oUserGroupFunction->getFunction());
    	}
        	
		
		$oUser->setFunctions ($funciones) ;

		//reseteamos los intentos del usuario
		$oUser->setNu_attemps( 0 );
		$this->update($oUser, false);
		
		
		return $oUser;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnAdd()
	 */
    protected function validateOnAdd(Entity $entity){
    	
    	parent::validateOnAdd($entity);
    	$error='';
    	$separarCUIL = explode('-',trim($entity->getDs_username()));

		$preCuil = $separarCUIL[0]; 
		$documento = $separarCUIL[1]; 
		$posCuil = $separarCUIL[2]; 
    	
    	if ((strlen($preCuil)!=2)||(strlen($posCuil)!=1)) {
    		$error .=CYT_SECURE_MSG_USER_CUIL_FORMAT.'<br />';
    	}
    	
    	$oUserUserGroups = $entity->getUsergroups();
    	if ($oUserUserGroups->isEmpty()) {
    		$error .=CYT_SECURE_MSG_USER_USERGROUP_REQUIRED.'<br />';
    	}
    	
    	if ($error) {
    		throw new GenericException( $error );
    	}
    }
    
    /**
     * (non-PHPdoc)
     * @see classes/com/entities/manager/EntityManager::validateOnUpdate()
     */
	protected function validateOnUpdate(Entity $entity){
	
		parent::validateOnUpdate($entity);

		$error='';
    	$separarCUIL = explode('-',trim($entity->getDs_username()));

		$preCuil = $separarCUIL[0]; 
		$documento = $separarCUIL[1]; 
		$posCuil = $separarCUIL[2]; 
    	
    	if ((strlen($preCuil)!=2)||(strlen($posCuil)!=1)) {
    		$error .=CYT_SECURE_MSG_USER_CUIL_FORMAT.'<br />';
    	}
    	
		$oUserUserGroups = $entity->getUsergroups();
    	if ($oUserUserGroups->isEmpty()) {
    		$error .=CYT_SECURE_MSG_USER_USERGROUP_REQUIRED.'<br />';
    	}
    	
    	if ($error) {
    		throw new GenericException( $error );
    	}
		
	}
	
/**
	 * se desbloquea un usuario
	 * @param int identificador del usuario a desbloquear.
	 */
	public function unblockCYTUser($id) { 
		
		$oUser = $this->getObjectByCode($id);
		
		//reseteamos los attemps.
		$oUser->setNu_attemps(0);
		
		//generamos una nueva password.
		$newPassword =  CdtUtils::textoRadom(8) ;
		$oUser->setDs_password ( md5( $newPassword ) );
				
		$this->update($oUser, false);
		
		//enviamos el email con la nueva contrase�a.
		$to = $oUser->getDs_email();
		$nameTo = $oUser->getDs_name();
		if(!empty($namteTo))
			$nameTo = str_replace(",","", $namteTo);
		else	
			$nameTo = $oUser->getDs_username();
			
		$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_MAIL_FORGOT_PASSWORD);
		$xtpl->assign('name', $nameTo);
		$xtpl->assign('password', $newPassword);
		$xtpl->parse('main');		
		$msg = $xtpl->text('main');
		
        if(empty($subject))
        	$subject = CDT_SECURE_MSG_FORGOT_PASSWORD_MAIL_SUBJECT;
        
		CYTSecureUtils::sendMail($nameTo, $to, $subject, $msg);
		
		
	}
	
	/**
	 * se le envía una nueva contraseña a un usuario
	 * @param $ds_user puede ser el email o el cuil
	 */
	public function sendNewPassword( $ds_user, $subject="" ){
		
		
		
		//recuperamos el usuario por su nombre.
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_username', $ds_user, '=', new CdtCriteriaFormatStringValue());
		
		$oUser = $this->getEntity($oCriteria);	
			
				
		if (empty($oUser)) {
			//si no existe buscamos por email.
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('ds_email', $ds_user, '=', new CdtCriteriaFormatStringValue());
			
			$oUser = $this->getEntity($oCriteria);	
			
			if( $oUser == null )
				throw new GenericException( CDT_SECURE_MSG_INVALID_USER );
			
			
		}
		//generamos la nueva clave.
		$newPassword =  CdtUtils::textoRadom(8) ;
		$oUser->setDs_password ( md5( $newPassword ) );
		
		//modificamos el usuario.
		$this->update($oUser, false);
		
		//enviamos el email con la nueva contrase�a.
		$to = $oUser->getDs_email();
		$nameTo = $oUser->getDs_name();
		if(!empty($namteTo))
			$nameTo = str_replace(",","", $namteTo);
		else{	
			$separarCUIL = explode('-',trim($oUser->getDs_username()));
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
		
			$managerDocente =  CYTSecureManagerFactory::getDocenteManager();
			$oDocente = $managerDocente->getEntity($oCriteria);
			if (!empty($oDocente)) {
				$nameTo = $oDocente->getDs_nombre().' '.$oDocente->getDs_Apellido();
			}
			else $nameTo = $oUser->getDs_name();
		}
			
		$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_MAIL_FORGOT_PASSWORD );
		$xtpl->assign ( 'WEB_PATH', WEB_PATH );
		$xtpl->assign('name', $nameTo);
		$xtpl->assign('password', $newPassword);
		$xtpl->parse('main');		
		$msg = $xtpl->text('main');
		
        if(empty($subject))
        	$subject = CDT_SECURE_MSG_FORGOT_PASSWORD_MAIL_SUBJECT;
        
		CYTSecureUtils::sendMail($nameTo, $to, $subject, $msg);
		
		
	}
	
	public function activateRegistration( $ds_activationCode ){

		$oRegistrationManager = CYTSecureManagerFactory::getRegistrationManager();
		
		//buscamos la registraci�n
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_activationcode', $ds_activationCode, "=", new CdtCriteriaFormatStringValue());
				
		
		$oRegistration = $oRegistrationManager->getEntity( $oCriteria ); 
		
		if(!$oRegistration){
			throw new GenericException( CDT_SECURE_MSG_ACTIVATION_CODE_INVALID );			
		}
		
		//vemos si ya expir�
		$dt_expiredTime = $oRegistration->getDt_date();
		$dt_expiredTime= date("Ymd", strtotime("$dt_expiredTime + 30 days"));
		$dt_date = date("Ymd");
		if($dt_expiredTime < $dt_date ){
			throw new GenericException( CDT_SECURE_MSG_ACTIVATION_CODE_EXPIRED );			
		}
		
		
		
		$oUser = new User();
		
		$oUser->setDs_username( $oRegistration->getDs_username() );
		$oUser->setDs_name( $oRegistration->getDs_name() );
		$oUser->setDs_password( $oRegistration->getDs_password() );
		$oUser->setDs_email( $oRegistration->getDs_email() );
		$oUser->setFacultad( $oRegistration->getFacultad() );
		
		//setear el usergroup por default.
		$oUserGroupManager = new CdtUserGroupManager();
		$oUserGroup = $oUserGroupManager->getCdtUserGroupById( CDT_SECURE_USERGROUP_DEFAULT_ID );
		
		$oUserUserGroup = new UserUserGroup();
		$oUserUserGroup->setUser($oUser);
		$oUserUserGroup->setUserGroup($oUserGroup);
		
		//setear el usergroup como director de unidad.
		$oUserGroupManager = new CdtUserGroupManager();
		$oUserGroup = $oUserGroupManager->getCdtUserGroupById( CYT_CD_GROUP_DIRECTOR );
		
		$oUserUserGroupDirector = new UserUserGroup();
		$oUserUserGroupDirector->setUser($oUser);
		$oUserUserGroupDirector->setUserGroup($oUserGroup);
		
		//setear el usergroup como director de proyecto.
		$oUserGroupManager = new CdtUserGroupManager();
		$oUserGroup = $oUserGroupManager->getCdtUserGroupById( CYT_CD_GROUP_DIRECTOR_PROYECTO );
		
		$oUserUserGroupDirectorProyecto = new UserUserGroup();
		$oUserUserGroupDirectorProyecto->setUser($oUser);
		$oUserUserGroupDirectorProyecto->setUserGroup($oUserGroup);
		
		$oUserGroups = new ItemCollection();
		$oUserGroups->addItem($oUserUserGroup);
		$oUserGroups->addItem($oUserUserGroupDirector);
		$oUserGroups->addItem($oUserUserGroupDirectorProyecto);
		$oUser->setUsergroups( $oUserGroups );
		
		//persistir el usuario en la bbdd.
		$this->add( $oUser, false );		
		
		$separarCUIL = explode('-',trim($oUser->getDs_username()));
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
		
		$managerDocente =  CYTSecureManagerFactory::getDocenteManager();
		$oDocente = $managerDocente->getEntity($oCriteria);
		if (empty($oDocente)) {
			throw new GenericException( CYT_SECURE_MSG_ACTIVATION_SOLICITANTE_ERROR );			
		}
		
		
		//borrar la registración.
		$oRegistrationManager->delete( $oRegistration->getOid() );
		
		
		
		
	}	
	
	public function updateCYTUserProfile(User $oUser, $ds_newPassword=null) { 

		
		$oOldUser = $this->getObjectByCode($oUser->getOid());
		
		//$oCdtUser->setCd_usergroup( $oOldUser->getCd_usergroup() );
		
		if(!empty($ds_newPassword)){
			
			//chequeamos la clave actual.

			$ds_oldPassword =  $oOldUser->getDs_password() ;
			$ds_password = md5 ( $oUser->getDs_password() );
			$ds_newPassword =  md5( $ds_newPassword ) ;
			
			if( $ds_oldPassword != $ds_password )
				throw new GenericException( CDT_SECURE_MSG_INVALID_PASSWORD );

			$oUser->setDs_password( $ds_newPassword );
			
			//actualizar la clave de usuario.
			//$this->getCdtUserDAO()->updatePassword($oUser);
		}
		
		//persistir en la bbdd.
		$this->update($oUser, false);
	}
	
}
?>
