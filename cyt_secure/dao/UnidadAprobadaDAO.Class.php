<?php

/**
 * DAO para UnidadAprobada
 *  
 * @author Marcos
 * @since 29-05-2014
 */
class UnidadAprobadaDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_UNIDAD_APROBADA;
	}
	
	public function getEntityFactory(){
		return new UnidadAprobadaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_unidadaprobada";
	}
	
	public function getFromToSelect(){
		
		$tUnidadAprobada = $this->getTableName();
		
		$tUnidad = CYTSecureDAOFactory::getLugarTrabajoDAO()->getTableName();
		
		$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tUnidad . " ON($tUnidadAprobada.cd_unidad = $tUnidad.cd_unidad)";
        
        $sql .= " LEFT JOIN " . $tPeriodo . " ON($tUnidadAprobada.cd_periodo = $tPeriodo.cd_periodo)";
         
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$fields = parent::getFieldsToSelect();
		
        $tUnidad = CYTSecureDAOFactory::getLugarTrabajoDAO()->getTableName();
        $fields[] = "$tUnidad.cd_unidad as " . $tUnidad . "_oid ";
        $fields[] = "$tUnidad.ds_unidad as " . $tUnidad . "_ds_unidad ";
        
        $tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
        $fields[] = "$tPeriodo.cd_periodo as " . $tPeriodo . "_oid ";
        $fields[] = "$tPeriodo.ds_periodo as " . $tPeriodo . "_ds_periodo ";
        
        return $fields;
	}
	
	
	

	
	
}
?>