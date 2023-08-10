<?php

/**
 * DAO para Facultad
 *  
 * @author Marcos
 * @since 21-10-2013
 */
class FacultadDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_FACULTAD;
	}
	
	public function getEntityFactory(){
		return new FacultadFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_facultad";
	}
	
	
	public function getFromToSelect(){
		
		$tFacultad = $this->getTableName();
		
		$tCat = CYTSecureDAOFactory::getCatDAO()->getTableName();
		
		
		
        $sql  = parent::getFromToSelect();
       
       	 $sql .= " LEFT JOIN " . $tCat . " ON($tFacultad.cd_cat = $tCat.cd_cat)";
        
        
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tCat = CYTSecureDAOFactory::getCatDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        
       $fields[] = "$tCat.cd_cat as " . $tCat . "_oid ";
        $fields[] = "$tCat.ds_cat as " . $tCat . "_ds_cat ";
       
       
        return $fields;
	}	
	
	
	

	
	
}
?>