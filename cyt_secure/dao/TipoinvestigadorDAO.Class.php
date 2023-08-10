<?php

/**
 * DAO para Tipoinvestigador
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoinvestigadorDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TIPO_INVESTIGADOR;
	}
	
	public function getEntityFactory(){
		return new TipoinvestigadorFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_tipoinvestigador";
	}
	
	
	
	
	

	
	
}
?>