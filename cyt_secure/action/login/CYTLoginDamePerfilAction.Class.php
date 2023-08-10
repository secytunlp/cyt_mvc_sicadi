<?php

/**
 * Se trae los perfiles
 * 
 * @author Marcos
 * @since 10-11-2013
 *
 */
class CYTLoginDamePerfilAction extends CdtAction{


	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		
		$result = array();
		
		try{
			
			$perfiles = array();
			
			$nu_documento = CdtUtils::getParam("nu_documento");
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('ds_username', '-'.$nu_documento.'-', 'LIKE', new CdtCriteriaFormatLikeValue());
			
			$oUserManager = CYTSecureManagerFactory::getUserManager();
			
			$oUser = $oUserManager->getEntity($oCriteria);
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('user_oid', $oUser->getOid(), '=');
			$tUserGroup = CYT_TABLE_CDTUSERGROUP;
			$filter = new CdtSimpleExpression("($tUserGroup.cd_usergroup IN(".CYT_CD_GROUPS_MOSTRAR."))");
			$oCriteria->setExpresion($filter);
			
			$oUserUserGroupManager = CYTSecureManagerFactory::getUserUserGroupManager();
			
			$oUserUserGroups = $oUserUserGroupManager->getEntities($oCriteria);
			
			foreach ($oUserUserGroups as $oUserUserGroup) {
				$perfil = array();
				$perfil["cd"]=$oUserUserGroup->getUserGroup()->getCd_usergroup();
				$perfil["ds"]=$oUserUserGroup->getUserGroup()->getDs_usergroup();
				$perfiles[]=$perfil;
			}
			
			$result['perfil'] = $perfiles;
	
	
			
			
		}catch(Exception $ex){
			
			$result['error'] = $ex->getMessage();
			
		}

		echo json_encode( $result ); 
		return null;
	}
	
	
	
}