<?php

/**
 * DAO para Especialidad
 *  
 * @author Marcos
 * @since 09-02-2015
 */
class EspecialidadDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_ESPECIALIDAD;
	}
	
	public function getEntityFactory(){
		return new EspecialidadFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_especialidad";
	}
	
	
	
	
	

	
	
}
?>