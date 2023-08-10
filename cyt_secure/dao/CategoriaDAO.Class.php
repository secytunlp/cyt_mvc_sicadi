<?php

/**
 * DAO para Categoria
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CategoriaDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CATEGORIA;
	}
	
	public function getEntityFactory(){
		return new CategoriaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_categoria";
	}
	
	
	
	
	

	
	
}
?>