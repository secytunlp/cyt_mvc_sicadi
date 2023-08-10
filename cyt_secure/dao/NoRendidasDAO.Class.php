<?php

/**
 * DAO para NoRendidas
 *  
 * @author Marcos
 * @since 22-05-2014
 */
class NoRendidasDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_NO_RENDIDAS;
	}
	
	public function getEntityFactory(){
		return new NoRendidasFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
				
		return $fieldsValues;
	}
	
	
	
	
	
	public function getFromToSelect(){
		$tNoRendidas = $this->getTableName();
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		
		$sql  = parent::getFromToSelect();
		
		
		$sql .= " LEFT JOIN " . $tDocente . " ON($tNoRendidas.nu_documento = $tDocente.nu_documento)";
		
		 return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$fields = parent::getFieldsToSelect();
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        $fields[] = "$tDocente.nu_documento as " . $tDocente . "_nu_documento ";
        $fields[] = "$tDocente.nu_precuil as " . $tDocente . "_nu_precuil ";
        $fields[] = "$tDocente.nu_postcuil as " . $tDocente . "_nu_postcuil ";
        
         return $fields;
	}
	
	
	
	

	
	
}
?>