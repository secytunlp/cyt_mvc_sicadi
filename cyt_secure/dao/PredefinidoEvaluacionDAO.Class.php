<?php

/**
 * DAO para PredefinidoEvaluacion
 *  
 * @author Marcos
 * @since 20-08-2019
 */
class PredefinidoEvaluacionDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_PREDEFINIDO_EVALUACION;
	}
	
	public function getEntityFactory(){
		return new PredefinidoEvaluacionFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_predefinido";
	}
	
	
	
	
	

	
	
}
?>