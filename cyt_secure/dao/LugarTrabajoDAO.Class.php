<?php

/**
 * DAO para LugarTrabajo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class LugarTrabajoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_LUGAR_TRABAJO;
	}
	
	public function getEntityFactory(){
		return new LugarTrabajoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues["ds_unidad"] = $this->formatString( $entity->getDs_unidad() );
    	$fieldsValues["ds_direccion"] = $this->formatString( $entity->getDs_direccion() );
    	$fieldsValues["ds_mail"] = $this->formatString( $entity->getDs_mail() );
    	$fieldsValues["ds_telefono"] = $this->formatString( $entity->getDs_telefono() );
   
    	return $fieldsValues;
	}
	
	
	
	public function getIdFieldName(){
		return "cd_unidad";
	}
	
	public function getFromToSelect(){
		
		$tLugarTrabajo = $this->getTableName();
		$tLugarTrabajo2 = CYTSecureDAOFactory::getLugarTrabajoDAO()->getTableName();
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tLugarTrabajo2 . " PADRE ON($tLugarTrabajo.cd_padre = PADRE.cd_unidad)";
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tLugarTrabajo2 = 'PADRE';
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tLugarTrabajo2.cd_unidad as " . $tLugarTrabajo2 . "_cd_unidad ";
        $fields[] = "$tLugarTrabajo2.ds_unidad as " . $tLugarTrabajo2 . "_ds_unidad ";
        $fields[] = "$tLugarTrabajo2.ds_sigla as " . $tLugarTrabajo2 . "_ds_sigla ";
       	
        
        return $fields;
	}	
	
	
	

	
	
}
?>