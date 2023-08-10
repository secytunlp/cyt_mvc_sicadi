<?php

/**
 * DAO para Disciplina
 *  
 * @author Marcos
 * @since 09-02-2015
 */
class DisciplinaDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_DISCIPLINA;
	}
	
	public function getEntityFactory(){
		return new DisciplinaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_disciplina";
	}
	
	
	
	
	

	
	
}
?>