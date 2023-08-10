<?php

/**
 * DAO para Organismo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class OrganismoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_ORGANISMO;
	}
	
	public function getEntityFactory(){
		return new OrganismoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_organismo";
	}
	
	
	
	
	

	
	
}
?>