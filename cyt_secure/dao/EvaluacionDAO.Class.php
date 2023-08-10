<?php

/**
 * DAO para Evaluacion
 *
 * @author Marcos
 * @since 17-11-2013
 */
class EvaluacionDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_EVALUACION;
	}

	public function getEntityFactory(){
		return new EvaluacionFactory();
	}
	
	public function getIdFieldName(){
		return "cd_evaluacion";
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();
		$fieldsValues["cd_usuario"] = $this->formatIfNull( $entity->getUser()->getOid(), 'null' );
		$fieldsValues["cd_solicitud"] = $this->formatIfNull( $entity->getSolicitud()->getOid(), 'null' );
		$fieldsValues["dt_fecha"] = $this->formatString($entity->getDt_fecha());
		$fieldsValues["bl_interno"] = $this->formatIfNull( $entity->getBl_interno(), '0' );
		$fieldsValues["nu_puntaje"] = $this->formatIfNull( $entity->getNu_puntaje(), '0' );
		$fieldsValues["ds_observacion"] = $this->formatString($entity->getDs_observacion());	
		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();
		$fieldsValues["cd_usuario"] = $this->formatIfNull( $entity->getUser()->getOid(), 'null' );
		$fieldsValues["dt_fecha"] = $this->formatString($entity->getDt_fecha());
		$fieldsValues["nu_puntaje"] = $this->formatString($entity->getNu_puntaje());
		$fieldsValues["ds_observacion"] = $this->formatString($entity->getDs_observacion());	

		return $fieldsValues;
	}
	
	
	
	public function getFromToSelect(){
		
		$tEvaluacion = $this->getTableName();
		
		$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
		$tEvaluacionEstado = CYTSecureDAOFactory::getEvaluacionEstadoDAO()->getTableName();
		
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tSolicitud . " ON($tEvaluacion.cd_solicitud = $tSolicitud.cd_solicitud)";
        $sql .= " LEFT JOIN " . $tPeriodo . " ON($tSolicitud.cd_periodo = $tPeriodo.cd_periodo)";
        $sql .= " LEFT JOIN " . $tDocente . " ON($tSolicitud.cd_docente = $tDocente.cd_docente)";
       	$sql .= " LEFT JOIN " . $tEvaluacionEstado . " ON($tEvaluacionEstado.evaluacion_oid = $tEvaluacion.cd_evaluacion)";
        $sql .= " LEFT JOIN " . $tEstado . " ON($tEvaluacionEstado.estado_oid = $tEstado.cd_estado)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEvaluacion.cd_usuario = $tUser.oid)";
        $sql .= " LEFT JOIN " . $tFacultad . " Facultad ON($tUser.facultad_oid = Facultad.cd_facultad)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		$fields = array();
		$fields[] = $this->getTableName() . ".cd_evaluacion as oid ";
		$fields[] = $this->getTableName() . ".cd_usuario ";
		$fields[] = $this->getTableName() . ".cd_solicitud ";
		$fields[] = $this->getTableName() . ".dt_fecha ";
		$fields[] = $this->getTableName() . ".bl_interno ";
		$fields[] = $this->getTableName() . ".nu_puntaje ";
		$fields[] = $this->getTableName() . ".ds_observacion ";
		
                
        $tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
		$fields[] = "$tSolicitud.cd_solicitud as " . $tSolicitud . "_oid ";
		
		$tPeriodo = CYTSecureDAOFactory::getPeriodoDAO()->getTableName();
		$fields[] = "$tPeriodo.cd_periodo as " . $tPeriodo . "_oid ";
        $fields[] = "$tPeriodo.ds_periodo as " . $tPeriodo . "_ds_periodo ";
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        
       	$tEstado = CYTSecureDAOFactory::getEstadoEvaluacionDAO()->getTableName();
		$fields[] = "$tEstado.cd_estado as " . $tEstado . "_oid ";
        $fields[] = "$tEstado.ds_estado as " . $tEstado . "_ds_estado ";
        
        $tEvaluacionEstado = CYTSecureDAOFactory::getEvaluacionEstadoDAO()->getTableName();
		$fields[] = "$tEvaluacionEstado.oid as " . $tEvaluacionEstado . "_oid ";
        $fields[] = "$tEvaluacionEstado.fechaDesde as " . $tEvaluacionEstado . "_fechaDesde ";
        $fields[] = "$tEvaluacionEstado.fechaHasta as " . $tEvaluacionEstado . "_fechaHasta ";
        
        $tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$fields[] = "$tUser.oid AS ".$tUser."_oid";
        $fields[] = "CASE $tUser.ds_name WHEN '' THEN $tUser.ds_username ELSE $tUser.ds_name END AS ds_username";
        
        $fields[] = "$tFacultad.cd_facultad as " . $tFacultad . "_oid ";
        $fields[] = "$tFacultad.ds_facultad as " . $tFacultad . "_ds_facultad ";
        
        return $fields;
	}	
	
	public function deleteEvaluacionPorSolicitud($solicitud_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE solicitud_oid = $solicitud_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>