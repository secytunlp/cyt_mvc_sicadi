<?php

/**
 * DAO para Evaluador
 *  
 * @author Marcos
 * @since 15-05-2014
 */
class EvaluadorDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CDT_USER;
	}
	
	public function getEntityFactory(){
		return new UserFactory();
	}
	
	public function getFieldsToAdd($entity){

		
	}
	
	
	
	
	public function getFromToSelect(){
		
		$tUser = $this->getTableName();
		
		$tGroup = CYT_TABLE_USER_USERGROUP;
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		$tCat = CYTSecureDAOFactory::getCatDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " INNER JOIN " . $tGroup . " ON($tUser.oid = $tGroup.user_oid) AND ($tGroup.usergroup_oid = ".CYT_CD_GROUP_EVALUADOR.")";
        
        $sql .= " LEFT JOIN " . $tFacultad . " ON($tUser.facultad_oid = $tFacultad.cd_facultad)";
        
        $sql .= " LEFT JOIN " . $tCat . " ON($tFacultad.cd_cat = $tCat.cd_cat)";
       
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		$fields = parent::getFieldsToSelect();
		
       
       
        
        return $fields;
	}
	
	
	
	
	
	
	
	
	

	
	
}
?>