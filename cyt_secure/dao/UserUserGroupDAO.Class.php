<?php

/**
 * DAO para User UserGroup
 *
 * @author Marcos
 * @since 09-11-2013
 */
class UserUserGroupDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_USER_USERGROUP;
	}

	public function getEntityFactory(){
		return new UserUserGroupFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getOid(), 'null' );
		$fieldsValues["userGroup_oid"] = $this->formatIfNull( $entity->getUserGroup()->getCd_usergroup(), 'null' );
		
		

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tUserUserGroup = $this->getTableName();
		
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		
		$tUserGroup = CYT_TABLE_CDTUSERGROUP;
		
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tUser . " ON($tUserUserGroup.user_oid = $tUser.oid)";
       
        $sql .= " LEFT JOIN " . $tUserGroup . " ON($tUserUserGroup.userGroup_oid = $tUserGroup.cd_usergroup)";
       
        
        
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        $tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
        $fields[] = "$tUser.oid as " . $tUser . "_oid ";
        
        $fields[] = "CASE $tUser.ds_name WHEN '' THEN $tUser.ds_username ELSE $tUser.ds_name END AS ".$tUser . "_ds_username";
        
        
       
        
        $tUserGroup = CYT_TABLE_CDTUSERGROUP;
		$fields[] = "$tUserGroup.cd_usergroup as " . $tUserGroup . "_cd_usergroup ";
       	$fields[] = "$tUserGroup.ds_usergroup as " . $tUserGroup . "_ds_usergroup ";
       
       
        return $fields;
	}	
	
	public function deleteUserUserGroupForUser($user_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE user_oid = $user_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>