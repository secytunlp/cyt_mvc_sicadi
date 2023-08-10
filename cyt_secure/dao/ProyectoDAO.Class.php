<?php

/**
 * DAO para Proyecto
 *  
 * @author Marcos
 * @since 12-11-2013
 */
class ProyectoDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_PROYECTO;
	}
	
	public function getEntityFactory(){
		return new ProyectoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_proyecto";
	}
	
	
	public function getFromToSelect(){
		
		$tProyecto = $this->getTableName();
		
		$tDocente = CYTSecureDAOFactory::getDocenteDAO()->getTableName();
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		$tIntegrante = CYTSecureDAOFactory::getIntegranteDAO()->getTableName();
		$tTipoEstadoProyecto = CYTSecureDAOFactory::getTipoEstadoProyectoDAO()->getTableName();
		$tDisciplina = CYTSecureDAOFactory::getDisciplinaDAO()->getTableName();
		$tEspecialidad = CYTSecureDAOFactory::getEspecialidadDAO()->getTableName();
		
		
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tFacultad . " ON($tProyecto.cd_facultad = $tFacultad.cd_facultad)";
        $sql .= " LEFT JOIN " . $tIntegrante . " ON($tProyecto.cd_proyecto = $tIntegrante.cd_proyecto)";
        $sql .= " LEFT JOIN " . $tDocente . " ON($tIntegrante.cd_docente = $tDocente.cd_docente)";
        $sql .= " LEFT JOIN " . $tTipoEstadoProyecto . " ON($tProyecto.cd_estado = $tTipoEstadoProyecto.cd_estado)";
        
        $sql .= " LEFT JOIN " . $tIntegrante . " DIR ON($tProyecto.cd_proyecto = DIR.cd_proyecto)";
        $sql .= " LEFT JOIN " . $tDocente . " DOCDIR ON(DIR.cd_docente = DOCDIR.cd_docente)";
       
        $sql .= " LEFT JOIN " . $tDisciplina . " ON($tProyecto.cd_disciplina = $tDisciplina.cd_disciplina)";
        $sql .= " LEFT JOIN " . $tEspecialidad . " ON($tProyecto.cd_especialidad = $tEspecialidad.cd_especialidad)";
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tFacultad.cd_facultad as " . $tFacultad . "_oid ";
        $fields[] = "$tFacultad.ds_facultad as " . $tFacultad . "_ds_facultad ";
        
        $tIntegrante = CYTSecureDAOFactory::getIntegranteDAO()->getTableName();
        $fields[] = "$tIntegrante.dt_alta as " . $tIntegrante . "_dt_alta ";
        $fields[] = "$tIntegrante.dt_baja as " . $tIntegrante . "_dt_baja ";
        
        
       	
       
        
        $tTipoEstadoProyecto = CYTSecureDAOFactory::getTipoEstadoProyectoDAO()->getTableName();
        $fields[] = "$tTipoEstadoProyecto.cd_estado as " . $tTipoEstadoProyecto . "_oid ";
        $fields[] = "$tTipoEstadoProyecto.ds_estado as " . $tTipoEstadoProyecto . "_ds_estado ";
        
        $tDocente = 'DOCDIR';
        $fields[] = "$tDocente.cd_docente as " . $tDocente . "_oid ";
        $fields[] = "$tDocente.ds_apellido as " . $tDocente . "_ds_apellido ";
        $fields[] = "$tDocente.ds_nombre as " . $tDocente . "_ds_nombre ";
        
        $tDisciplina = CYTSecureDAOFactory::getDisciplinaDAO()->getTableName();
        $fields[] = "$tDisciplina.cd_disciplina as " . $tDisciplina . "_oid ";
        $fields[] = "$tDisciplina.ds_disciplina as " . $tDisciplina . "_ds_disciplina ";
        
        $tEspecialidad = CYTSecureDAOFactory::getEspecialidadDAO()->getTableName();
        $fields[] = "$tEspecialidad.cd_especialidad as " . $tEspecialidad . "_oid ";
        $fields[] = "$tEspecialidad.ds_especialidad as " . $tEspecialidad . "_ds_especialidad ";
        
       
        
        return $fields;
	}
	
	

	
	
}
?>