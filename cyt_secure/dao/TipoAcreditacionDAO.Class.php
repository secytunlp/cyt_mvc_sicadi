<?php

/**
 * DAO para TipoAcreditacion
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoAcreditacionDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TIPO_ACREDITACION;
	}
	
	public function getEntityFactory(){
		return new TipoAcreditacionFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_tipoacreditacion";
	}
	
	
	
	
	

	
	
}
?>