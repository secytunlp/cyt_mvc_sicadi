<?php

/**
 * DAO para Estado
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class EstadoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_ESTADO;
	}
	
	public function getEntityFactory(){
		return new EstadoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_estado";
	}
	
	
	
	
	

	
	
}
?>