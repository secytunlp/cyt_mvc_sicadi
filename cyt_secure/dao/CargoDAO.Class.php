<?php

/**
 * DAO para Cargo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CargoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CARGO;
	}
	
	public function getEntityFactory(){
		return new CargoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_cargo";
	}
	
	
	
	
	

	
	
}
?>