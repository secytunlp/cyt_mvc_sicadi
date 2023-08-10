<?php

/**
 * DAO para Beca
 *  
 * @author Marcos
 * @since 18-12-2013
 */
class BecaDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_BECA;
	}
	
	public function getEntityFactory(){
		return new BecaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_beca";
	}
	
	
public function getFromToSelect(){
		
		$tBeca = $this->getTableName();
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		
		
		
		
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tDocente . " ON($tBeca.cd_docente = $tDocente.cd_docente)";
        
       
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        
        
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