<?php

/**
 * DAO para TipoPresupuesto
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoPresupuestoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TIPO_PRESUPUESTO;
	}
	
	public function getEntityFactory(){
		return new TipoPresupuestoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_tipopresupuesto";
	}
	
	
	
	
	

	
	
}
?>