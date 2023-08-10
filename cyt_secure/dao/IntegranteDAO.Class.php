<?php

/**
 * DAO para Integrante
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class IntegranteDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_INTEGRANTE;
	}
	
	public function getEntityFactory(){
		return new IntegranteFactory();
	}
	
	public function getFieldsToAdd($entity){

		
	}
	
	
	
	
	public function getFromToSelect(){
		
	$tIntegrante = $this->getTableName();
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		
		
		
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tDocente . " ON($tIntegrante.cd_docente = $tDocente.cd_docente)";
       
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		$fields = parent::getFieldsToSelect();
		
       
        $tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
        $fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
       
        
        return $fields;
	}
	
	
	
	
	
	
	
	
	

	
	
}
?>