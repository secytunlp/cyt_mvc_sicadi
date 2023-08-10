<?php

/**
 * DAO para Titulo
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class TituloDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_TITULO;
	}
	
	public function getEntityFactory(){
		return new TituloFactory();
	}
	
	public function getFieldsToAdd($entity){
		$fieldsValues = array();
		
		$fieldsValues["ds_titulo"] = $this->formatString( $entity->getDs_titulo() ); 
		
		$fieldsValues["cd_universidad"] = $this->formatIfNull( $entity->getUniversidad()->getOid(), 'null' );
		
		$fieldsValues["nu_nivel"] = $this->formatIfNull( $entity->getNu_nivel(), 'null' );
		
		return $fieldsValues;
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_titulo";
	}
	
	public function getFromToSelect(){
		
		$tTitulo = $this->getTableName();
		
		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
		
		
		
		
		
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tUniversidad . " ON($tTitulo.cd_universidad = $tUniversidad.cd_universidad)";
        
        
        
       
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        
        
        
        
        $fields[] = "$tUniversidad.cd_universidad as " . $tUniversidad . "_oid ";
        $fields[] = "$tUniversidad.ds_universidad as " . $tUniversidad . "_ds_universidad ";
        
        
       	
        
        
        
       
        
        return $fields;
	}
	
	
	

	
	
}
?>