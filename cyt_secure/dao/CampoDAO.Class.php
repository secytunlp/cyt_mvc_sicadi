<?php

/**
 * DAO para Campo
 *  
 * @author Marcos
 * @since 18-09-2017
 */
class CampoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CAMPO;
	}
	
	public function getEntityFactory(){
		return new CampoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_campo";
	}
	
	
	
	
	

	
	
}
?>