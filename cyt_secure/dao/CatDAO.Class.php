<?php

/**
 * DAO para Cat
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class CatDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CAT;
	}
	
	public function getEntityFactory(){
		return new CatFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_cat";
	}
	
	
	
	
	

	
	
}
?>