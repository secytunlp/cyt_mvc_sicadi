<?php

/**
 * DAO para UserGroup Function
 *
 * @author Marcos
 * @since 10-11-2013
 */
class UserGroupFunctionDAO extends EntityDAO {

	public function getTableName(){
		return CDT_SECURE_TABLE_CDTUSERGROUPFUNCTION;
	}

	public function getEntityFactory(){
		return new UserGroupFunctionFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tUserGroupFunction = $this->getTableName();
		
		$tFunction = CDT_SECURE_TABLE_CDTFUNCTION;
		
		$tUserGroup = CYT_TABLE_CDTUSERGROUP;
		
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tFunction . " ON($tUserGroupFunction.cd_function = $tFunction.cd_function)";
       
        $sql .= " LEFT JOIN " . $tUserGroup . " ON($tUserGroupFunction.cd_usergroup = $tUserGroup.cd_usergroup)";
       
        
        
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        $tFunction = CDT_SECURE_TABLE_CDTFUNCTION;
		$fields[] = "$tFunction.cd_function as " . $tFunction . "_cd_function ";
       	$fields[] = "$tFunction.ds_function as " . $tFunction . "_ds_function ";
          
        $tUserGroup = CYT_TABLE_CDTUSERGROUP;
		$fields[] = "$tUserGroup.cd_usergroup as " . $tUserGroup . "_cd_usergroup ";
       	$fields[] = "$tUserGroup.ds_usergroup as " . $tUserGroup . "_ds_usergroup ";
       
       
        return $fields;
	}	
	
	

}
?>