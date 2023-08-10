<?php

/**
 * DAO para Deddoc
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class DeddocDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_DEDDOC;
	}
	
	public function getEntityFactory(){
		return new DeddocFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_deddoc";
	}
	
	
	
	
	

	
	
}
?>