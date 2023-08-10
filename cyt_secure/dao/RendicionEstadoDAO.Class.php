<?php

/**
 * DAO para Rendicion Rendicion
 *
 * @author Marcos
 * @since 04-03-2016
 */
class RendicionEstadoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_RENDICION_ESTADO;
	}

	public function getEntityFactory(){
		return new RendicionEstadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["rendicion_oid"] = $this->formatIfNull( $entity->getRendicion()->getOid(), 'null' );
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

		
		$fieldsValues["rendicion_oid"] = $this->formatIfNull( $entity->getRendicion()->getOid(), 'null' );
		$fieldsValues["estado_oid"] = $this->formatIfNull( $entity->getEstado()->getOid(), 'null' );
		
		
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["motivo"] = $this->formatString( $entity->getMotivo() );
		//$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tRendicionEstado = $this->getTableName();
		
		$tRendicion = CYTSecureDAOFactory::getRendicionDAO()->getTableName();
		
		$tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		$tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$tSolicitud = DAOFactory::getSolicitudDAO()->getTableName();
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tRendicion . " ON($tRendicionEstado.rendicion_oid = $tRendicion.oid)";
       // $sql .= " LEFT JOIN " . $tUser . " U ON($tRendicion.cd_usuario = U.oid)";
       	$sql .= " LEFT JOIN " . $tEstado . " ON($tRendicionEstado.estado_oid = $tEstado.cd_estado)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tRendicionEstado.user_oid = $tUser.oid)";
        
        $sql .= " LEFT JOIN " . $tSolicitud . " ON($tRendicion.solicitud_oid = $tSolicitud.cd_solicitud)";
        $sql .= " LEFT JOIN " . $tDocente . " ON($tSolicitud.cd_docente = $tDocente.cd_docente)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
                
        $tRendicion = CYTSecureDAOFactory::getRendicionDAO()->getTableName();
		$fields[] = "$tRendicion.oid as " . $tRendicion . "_oid ";
        
       	$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
        $fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        $fields[] = "$tDocente.nu_documento as " . $tDocente . "_nu_documento ";
        $fields[] = "$tDocente.nu_precuil as " . $tDocente . "_nu_precuil ";
        $fields[] = "$tDocente.nu_postcuil as " . $tDocente . "_nu_postcuil ";
		
        
        
        $tEstado = CYTSecureDAOFactory::getEstadoDAO()->getTableName();
		$fields[] = "$tEstado.cd_estado as " . $tEstado . "_oid ";
        $fields[] = "$tEstado.ds_estado as " . $tEstado . "_ds_estado ";
        
        $tUser = CYTSecureDAOFactory::getUserDAO()->getTableName();
		$fields[] = "$tUser.oid AS ".$tUser."_oid";
        $fields[] = "CASE $tUser.ds_name WHEN '' THEN $tUser.ds_username ELSE $tUser.ds_name END AS ds_username";
        
        return $fields;
	}	
	
	public function deleteRendicionEstadoPorRendicion($rendicion_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE rendicion_oid = $rendicion_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>