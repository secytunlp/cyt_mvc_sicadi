<?php

/**
 * DAO para Carrerainv
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CarrerainvDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CARRERAINV;
	}
	
	public function getEntityFactory(){
		return new CarrerainvFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_carrerainv";
	}
	
	
	
	
	

	
	
}
?>