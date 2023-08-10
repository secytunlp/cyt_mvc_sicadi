<?php 

/** 
 * Manager para CYTRegistration
 *  
 * @author Marcos
 * @since 05-11-2013
 */ 
class RegistrationManager extends EntityManager{ 

	
		public function getDAO(){
		return CYTSecureDAOFactory::getRegistrationDAO();
	}
	
	
	/**
	 * se realizan las validaciones para una nueva registraci�n
	 * @param CdtRegistration $oCdtRegistration registraci�n a validar.
	 * @throws GenericException
	 */
	protected function validateRegistration( Entity $oCdtRegistration ){
		
		//que no exista el nombre de usuario.
		
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_username', $oCdtRegistration->getDs_username(), '=', new CdtCriteriaFormatStringValue());
		
		$oUserManager = CYTSecureManagerFactory::getUserManager();
		$oUser = $oUserManager->getEntity($oCriteria);	
			
				
		if (!empty($oUser)) {
			CdtUtils::log_debug( "el usuario ya existe");
			throw new GenericException( CDT_SECURE_MSG_REGISTRATION_USERNAME_DUPLICATED );
		}
		
		
		
		//que tampoco exista una registación pendiente para el nombre de usuario.
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('ds_username', $oCdtRegistration->getDs_username(), "=", new CdtCriteriaFormatStringValue());
		$oRegistrationManager = CYTSecureManagerFactory::getRegistrationManager();
		$duplicated = $oRegistrationManager->getEntity($oCriteria);	
		
		if($duplicated!=null && $duplicated->getOid()!=0){
			throw new GenericException( CDT_SECURE_MSG_REGISTRATION_USERNAME_DUPLICATED );
		}
		
		
		
	}
	
	
	/**
	 * se agrega la nueva entity
	 * @param CdtRegistration $oCdtRegistration entity a agregar.
	 */
	public function add(Entity $entity) { 

		//validaciones;
		$this->validateRegistration( $entity );
		
		//generamos un c�digo de activaci�n y asignamos la fecha.
		$ds_activationCode=md5(uniqid(rand()));
		$dt_date = date('Ymd');

		$entity->setDs_activationcode( $ds_activationCode );
		$entity->setDt_date( $dt_date );
		//persistir en la bbdd.
		parent::add($entity);
		//env�o del email al futuro usuario con el c�digo de activaci�n.
		$subject = CDT_SECURE_MSG_REGISTRATION_EMAIL_SUBJECT;
		//$nameTo = $oCdtRegistration->getDs_username();
		$to = $entity->getDs_email();
		
		$activationLink = WEB_PATH . CDT_SECURE_ACTIVATE_REGISTRATION_ACTION . '&activationcode=' . $ds_activationCode;
		
		$xtpl = new XTemplate( CDT_SECURE_TEMPLATE_ACTIVATE_REGISTRATION_EMAIL );
		$xtpl->assign ( 'WEB_PATH', WEB_PATH );
		$xtpl->parse('main');
		$msg = $xtpl->text('main');
		
		$separarCUIL = explode('-',trim($entity->getDs_username()));
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('nu_documento', $separarCUIL[1], '=');
		
		$managerDocente =  CYTSecureManagerFactory::getDocenteManager();
		$oDocente = $managerDocente->getEntity($oCriteria);
		if (empty($oDocente)) {
			throw new GenericException( CYT_SECURE_MSG_ACTIVATION_SOLICITANTE_ERROR );			
		}
		else{
			
			$nameTo = $oDocente->getDs_nombre().' '.$oDocente->getDs_Apellido();
							
			
		}
		
		$params[] = $nameTo;
		$params[] = $activationLink;
        $msg = CdtFormatUtils::formatMessage($msg, $params);
		
        
        CYTSecureUtils::sendMail( $nameTo, $to, $subject, $msg );
        
		
	}
	


	
} 
?>
