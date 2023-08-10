<?php

/**
 * DAO para Universidad
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class UniversidadDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_UNIVERSIDAD;
	}
	
	public function getEntityFactory(){
		return new UniversidadFactory();
	}
	
	public function getFieldsToAdd($entity){
		$fieldsValues = array();
		
		$fieldsValues["ds_universidad"] = $this->formatString( $entity->getDs_universidad() ); 
		$fieldsValues["nu_jurisdiccion"] = 0;
		
		
		return $fieldsValues;
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_universidad";
	}
	
	
	
	
	

	
	
}
?>