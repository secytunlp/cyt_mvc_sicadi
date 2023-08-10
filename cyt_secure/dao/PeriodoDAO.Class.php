<?php

/**
 * DAO para Periodo
 *  
 * @author Marcos
 * @since 13-11-2013
 */
class PeriodoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_PERIODO;
	}
	
	public function getEntityFactory(){
		return new PeriodoFactory();
	}
	
	public function getFieldsToAdd($entity){
		$fieldsValues = array();
		
		$fieldsValues["ds_periodo"] = $this->formatString( $entity->getDs_periodo() ); 
		
		return $fieldsValues;
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_periodo";
	}
	
	
	
	
	

	
	
}
?>