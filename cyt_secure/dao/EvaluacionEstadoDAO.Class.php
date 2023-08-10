<?php

/**
 * DAO para Evaluacion Estado
 *
 * @author Marcos
 * @since 14-11-2013
 */
class EvaluacionEstadoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_EVALUACION_ESTADO;
	}

	public function getEntityFactory(){
		return new EvaluacionEstadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["evaluacion_oid"] = $this->formatIfNull( $entity->getEvaluacion()->getOid(), 'null' );
		$fieldsValues["estado_oid"] = $this->formatIfNull( $entity->getEstado()->getOid(), 'null' );
		
		
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["motivo"] = $this->formatString( $entity->getMotivo() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();

		
		$fieldsValues["evaluacion_oid"] = $this->formatIfNull( $entity->getEvaluacion()->getOid(), 'null' );
		$fieldsValues["estado_oid"] = $this->formatIfNull( $entity->getEstado()->getOid(), 'null' );
		
		
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["motivo"] = $this->formatString( $entity->getMotivo() );
		//$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEvaluacionEstado = $this->getTableName();
		
		$tEvaluacion = CYTSecureDAOFactory::getEvaluacionDAO()->getTableName();
		
		$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tEvaluacion . " ON($tEvaluacionEstado.evaluacion_oid = $tEvaluacion.cd_evaluacion)";
        $sql .= " LEFT JOIN " . $tUser . " U ON($tEvaluacion.cd_usuario = U.oid)";
       	$sql .= " LEFT JOIN " . $tEstado . " ON($tEvaluacionEstado.estado_oid = $tEstado.cd_estado)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEvaluacionEstado.user_oid = $tUser.oid)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
                
        $tEvaluacion = CYTSecureDAOFactory::getEvaluacionDAO()->getTableName();
		$fields[] = "$tEvaluacion.cd_evaluacion as " . $tEvaluacion . "_oid ";
        
       	
		 $fields[] = "U.oid as " . U . "_oid ";
        $fields[] = "CASE U.ds_name WHEN '' THEN U.ds_username ELSE U.ds_name END AS U_ds_username";
        
        
        $tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
		$fields[] = "$tEstado.cd_estado as " . $tEstado . "_oid ";
        $fields[] = "$tEstado.ds_estado as " . $tEstado . "_ds_estado ";
        
        $tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$fields[] = "$tUser.oid AS ".$tUser."_oid";
        $fields[] = "CASE $tUser.ds_name WHEN '' THEN $tUser.ds_username ELSE $tUser.ds_name END AS ".$tUser."_ds_username";
        
        return $fields;
	}	
	
	public function deleteEvaluacionEstadoPorEvaluacion($evaluacion_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE evaluacion_oid = $evaluacion_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>