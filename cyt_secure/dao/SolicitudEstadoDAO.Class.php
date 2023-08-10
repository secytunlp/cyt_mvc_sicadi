<?php

/**
 * DAO para Solicitud Estado
 *
 * @author Marcos
 * @since 14-11-2013
 */
class SolicitudEstadoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_SOLICITUD_ESTADO;
	}

	public function getEntityFactory(){
		return new SolicitudEstadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["solicitud_oid"] = $this->formatIfNull( $entity->getSolicitud()->getOid(), 'null' );
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

		
		$fieldsValues["solicitud_oid"] = $this->formatIfNull( $entity->getSolicitud()->getOid(), 'null' );
		$fieldsValues["estado_oid"] = $this->formatIfNull( $entity->getEstado()->getOid(), 'null' );
		
		
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["motivo"] = $this->formatString( $entity->getMotivo() );
		//$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tSolicitudEstado = $this->getTableName();
		
		$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tSolicitud . " ON($tSolicitudEstado.solicitud_oid = $tSolicitud.cd_solicitud)";
        $sql .= " LEFT JOIN " . $tDocente . " ON($tSolicitud.cd_docente = $tDocente.cd_docente)";
       	$sql .= " LEFT JOIN " . $tEstado . " ON($tSolicitudEstado.estado_oid = $tEstado.cd_estado)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tSolicitudEstado.user_oid = $tUser.oid)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
                
        $tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
		$fields[] = "$tSolicitud.cd_solicitud as " . $tSolicitud . "_oid ";
        
       	$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		 $fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        
        $tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		$fields[] = "$tEstado.cd_estado as " . $tEstado . "_oid ";
        $fields[] = "$tEstado.ds_estado as " . $tEstado . "_ds_estado ";
        
        $tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$fields[] = "$tUser.oid AS ".$tUser."_oid";
        $fields[] = "CASE $tUser.ds_name WHEN '' THEN $tUser.ds_username ELSE $tUser.ds_name END AS ds_username";
        
        return $fields;
	}	
	
	public function deleteSolicitudEstadoPorSolicitud($solicitud_oid, $idConn=0) {
    	
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