<?php

/**
 * DAO para TipoEstadoProyecto
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoEstadoProyectoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TIPO_ESTADO_PROYECTO;
	}
	
	public function getEntityFactory(){
		return new TipoEstadoProyectoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_estado";
	}
	
	
	
	
	

	
	
}
?>