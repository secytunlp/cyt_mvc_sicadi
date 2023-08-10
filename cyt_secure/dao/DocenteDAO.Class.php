<?php

/**
 * DAO para Docente
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class DocenteDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_DOCENTE;
	}
	
	public function getEntityFactory(){
		return new DocenteFactory();
	}
	
	public function getFieldsToAdd($entity){
		$fieldsValues = array();
		$fieldsValues["cd_docente"] = $this->formatIfNull( $entity->getOid(), 'null' );
		$fieldsValues["nu_ident"] = $this->formatIfNull( $entity->getOid(), 'null' );
		$fieldsValues["ds_nombre"] = $this->formatString( $entity->getDs_nombre() );
		$fieldsValues["ds_apellido"] = $this->formatString( $entity->getDs_apellido() );
		$fieldsValues["nu_precuil"] = $this->formatString( $entity->getNu_precuil() );
		$fieldsValues["nu_documento"] = $this->formatString( $entity->getNu_documento() );
		$fieldsValues["nu_postcuil"] = $this->formatString( $entity->getNu_postcuil() );
		$fieldsValues["cd_categoria"] = $this->formatIfNull( $entity->getCategoria()->getOid(), '1' );
		$fieldsValues["cd_carrerainv"] = $this->formatIfNull( $entity->getCarrerainv()->getOid(), 'null' );
		$fieldsValues["cd_organismo"] = $this->formatIfNull( $entity->getOrganismo()->getOid(), 'null' );
		$fieldsValues["cd_cargo"] = $this->formatIfNull( $entity->getCargo()->getOid(), 'null' );
		$fieldsValues["dt_cargo"] = $this->formatDate( $entity->getDt_cargo() );
		$fieldsValues["cd_deddoc"] = $this->formatIfNull( $entity->getDeddoc()->getOid(), 'null' );
		$fieldsValues["nu_dedinv"] = $this->formatIfNull( $entity->getDeddoc()->getOid(), 'null' );
		$fieldsValues["cd_facultad"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );
		$fieldsValues["cd_unidad"] = $this->formatIfNull( $entity->getLugarTrabajo()->getOid(), 'null' );
		$fieldsValues["bl_becario"] = $this->formatIfNull( $entity->getBl_becario(), '0' );
		$fieldsValues["ds_tipobeca"] = $this->formatString( $entity->getDs_tipobeca() );
		$fieldsValues["ds_orgbeca"] = $this->formatString( $entity->getDs_orgbeca() );
		$fieldsValues["dt_beca"] = $this->formatDate( $entity->getDt_beca() );
		$fieldsValues["dt_becaHasta"] = $this->formatDate( $entity->getDt_becaHasta() );
	  	$fieldsValues["ds_calle"] = $this->formatString( $entity->getDs_calle() );
		$fieldsValues["nu_nro"] = $this->formatString( $entity->getNu_nro() );
		$fieldsValues["nu_piso"] = $this->formatString( $entity->getNu_piso() );
		$fieldsValues["ds_depto"] = $this->formatString( $entity->getDs_depto() );
		$fieldsValues["nu_cp"] = $this->formatString( $entity->getNu_cp() );
		$fieldsValues["nu_telefono"] = $this->formatString( $entity->getNu_telefono() );
		$fieldsValues["ds_mail"] = $this->formatString( $entity->getDs_mail() );
		$fieldsValues["cd_titulo"] = $this->formatIfNull( $entity->getTitulo()->getOid(), 'null' );
		$fieldsValues["cd_titulopost"] = $this->formatIfNull( $entity->getTitulopost()->getOid(), 'null' );
		$fieldsValues["cd_universidad"] = $this->formatIfNull( $entity->getUniversidad()->getOid(), 'null' );
		$fieldsValues["bl_becaEstimulo"] = $this->formatIfNull( $entity->getBl_becaEstimulo(), '0' );
		$fieldsValues["dt_becaEstimulo"] = $this->formatDate( $entity->getDt_becaEstimulo() );
		$fieldsValues["dt_becaEstimuloHasta"] = $this->formatDate( $entity->getDt_becaEstimuloHasta() );
		return $fieldsValues;
		
	}
	
	public function getFieldsToUpdate($entity){
		$fieldsValues = array();
		$fieldsValues["ds_nombre"] = $this->formatString( $entity->getDs_nombre() );
		$fieldsValues["ds_apellido"] = $this->formatString( $entity->getDs_apellido() );
		$fieldsValues["nu_precuil"] = $this->formatString( $entity->getNu_precuil() );
		$fieldsValues["nu_documento"] = $this->formatString( $entity->getNu_documento() );
		$fieldsValues["nu_postcuil"] = $this->formatString( $entity->getNu_postcuil() );
		$fieldsValues["cd_categoria"] = $this->formatIfNull( $entity->getCategoria()->getOid(), '1' );
		$fieldsValues["cd_carrerainv"] = $this->formatIfNull( $entity->getCarrerainv()->getOid(), 'null' );
		$fieldsValues["cd_organismo"] = $this->formatIfNull( $entity->getOrganismo()->getOid(), 'null' );
		$fieldsValues["cd_cargo"] = $this->formatIfNull( $entity->getCargo()->getOid(), 'null' );
		$fieldsValues["dt_cargo"] = $this->formatDate( $entity->getDt_cargo() );
		$fieldsValues["cd_deddoc"] = $this->formatIfNull( $entity->getDeddoc()->getOid(), 'null' );
		$fieldsValues["nu_dedinv"] = $this->formatIfNull( $entity->getDeddoc()->getOid(), 'null' );
		$fieldsValues["cd_facultad"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );
		$fieldsValues["cd_unidad"] = $this->formatIfNull( $entity->getLugarTrabajo()->getOid(), 'null' );
		$fieldsValues["bl_becario"] = $this->formatIfNull( $entity->getBl_becario(), '0' );
		$fieldsValues["ds_tipobeca"] = $this->formatString( $entity->getDs_tipobeca() );
		$fieldsValues["ds_orgbeca"] = $this->formatString( $entity->getDs_orgbeca() );
		$fieldsValues["dt_beca"] = $this->formatDate( $entity->getDt_beca() );
		$fieldsValues["dt_becaHasta"] = $this->formatDate( $entity->getDt_becaHasta() );
	  	$fieldsValues["ds_calle"] = $this->formatString( $entity->getDs_calle() );
		$fieldsValues["nu_nro"] = $this->formatString( $entity->getNu_nro() );
		$fieldsValues["nu_piso"] = $this->formatString( $entity->getNu_piso() );
		$fieldsValues["ds_depto"] = $this->formatString( $entity->getDs_depto() );
		$fieldsValues["nu_cp"] = $this->formatString( $entity->getNu_cp() );
		$fieldsValues["nu_telefono"] = $this->formatString( $entity->getNu_telefono() );
		$fieldsValues["ds_mail"] = $this->formatString( $entity->getDs_mail() );
		$fieldsValues["cd_titulo"] = $this->formatIfNull( $entity->getTitulo()->getOid(), 'null' );
		$fieldsValues["cd_titulopost"] = $this->formatIfNull( $entity->getTitulopost()->getOid(), 'null' );
		$fieldsValues["cd_universidad"] = $this->formatIfNull( $entity->getUniversidad()->getOid(), 'null' );
		$fieldsValues["bl_becaEstimulo"] = $this->formatIfNull( $entity->getBl_becaEstimulo(), '0' );
		$fieldsValues["dt_becaEstimulo"] = $this->formatDate( $entity->getDt_becaEstimulo() );
		$fieldsValues["dt_becaEstimuloHasta"] = $this->formatDate( $entity->getDt_becaEstimuloHasta() );
		return $fieldsValues;
		
	}
	
	
	
	public function getIdFieldName(){
		return "cd_docente";
	}
	
	
public function getFromToSelect(){
		
		$tDocente = $this->getTableName();
		
		$tCategoria = CYTSecureDAOFactory::getCategoriaDAO()->getTableName();
		$tCarrerainv = CYTSecureDAOFactory::getCarrerainvDAO()->getTableName();
		$tOrganismo = CYTSecureDAOFactory::getOrganismoDAO()->getTableName();
		$tCargo = CYTSecureDAOFactory::getCargoDAO()->getTableName();
		$tDeddoc = CYTSecureDAOFactory::getDeddocDAO()->getTableName();
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		$tLugarTrabajo = CYTSecureDAOFactory::getLugarTrabajoDAO()->getTableName();
		$tTitulo = CYTSecureDAOFactory::getTituloDAO()->getTableName();
		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
		
		
		
        $sql  = parent::getFromToSelect();
       
        $sql .= " LEFT JOIN " . $tCategoria . " ON($tDocente.cd_categoria = $tCategoria.cd_categoria)";
        $sql .= " LEFT JOIN " . $tCarrerainv . " ON($tDocente.cd_carrerainv = $tCarrerainv.cd_carrerainv)";
        $sql .= " LEFT JOIN " . $tOrganismo . " ON($tDocente.cd_organismo = $tOrganismo.cd_organismo)";
        $sql .= " LEFT JOIN " . $tCargo . " ON($tDocente.cd_cargo = $tCargo.cd_cargo)";
        $sql .= " LEFT JOIN " . $tDeddoc . " ON($tDocente.cd_deddoc = $tDeddoc.cd_deddoc)";
        $sql .= " LEFT JOIN " . $tFacultad . " ON($tDocente.cd_facultad = $tFacultad.cd_facultad)";
        $sql .= " LEFT JOIN " . $tLugarTrabajo . " LugarTrabajo ON($tDocente.cd_unidad = LugarTrabajo.cd_unidad)";
        $sql .= " LEFT JOIN " . $tTitulo . " Titulo ON($tDocente.cd_titulo = Titulo.cd_titulo)";
        $sql .= " LEFT JOIN " . $tTitulo . " Tituloposgrado ON($tDocente.cd_titulopost = Tituloposgrado.cd_titulo)";
        $sql .= " LEFT JOIN " . $tUniversidad . " ON($tDocente.cd_universidad = $tUniversidad.cd_universidad)";
        
       
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		$tCategoria = CYTSecureDAOFactory::getCategoriaDAO()->getTableName();
		$tCarrerainv = CYTSecureDAOFactory::getCarrerainvDAO()->getTableName();
		$tOrganismo = CYTSecureDAOFactory::getOrganismoDAO()->getTableName();
		$tCargo = CYTSecureDAOFactory::getCargoDAO()->getTableName();
		$tDeddoc = CYTSecureDAOFactory::getDeddocDAO()->getTableName();
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		$tLugarTrabajo = "LugarTrabajo";
		//$tTitulo = CYTSecureDAOFactory::getTituloDAO()->getTableName();
		
		$tUniversidad = CYTSecureDAOFactory::getUniversidadDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        
        
        $fields[] = "$tCategoria.cd_categoria as " . $tCategoria . "_oid ";
        $fields[] = "$tCategoria.ds_categoria as " . $tCategoria . "_ds_categoria ";
        
        $fields[] = "$tCarrerainv.cd_carrerainv as " . $tCarrerainv . "_oid ";
        $fields[] = "$tCarrerainv.ds_carrerainv as " . $tCarrerainv . "_ds_carrerainv ";
        
        $fields[] = "$tOrganismo.cd_organismo as " . $tOrganismo . "_oid ";
        $fields[] = "$tOrganismo.ds_codigo as " . $tOrganismo . "_ds_codigo ";
        
        $fields[] = "$tCargo.cd_cargo as " . $tCargo . "_oid ";
        $fields[] = "$tCargo.ds_cargo as " . $tCargo . "_ds_cargo ";
        
        $fields[] = "$tDeddoc.cd_deddoc as " . $tDeddoc . "_oid ";
        $fields[] = "$tDeddoc.ds_deddoc as " . $tDeddoc . "_ds_deddoc ";
        
        $fields[] = "$tFacultad.cd_facultad as " . $tFacultad . "_oid ";
        $fields[] = "$tFacultad.ds_facultad as " . $tFacultad . "_ds_facultad ";
        
        $fields[] = "$tLugarTrabajo.cd_unidad as " . $tLugarTrabajo . "_oid ";
        $fields[] = "$tLugarTrabajo.ds_unidad as " . $tLugarTrabajo . "_ds_unidad ";
        $fields[] = "$tLugarTrabajo.ds_sigla as " . $tLugarTrabajo . "_ds_sigla ";
        
       	$fields[] = "Titulo.cd_titulo as Titulo_oid ";
        $fields[] = "Titulo.ds_titulo as Titulo_ds_titulo ";
        
        $fields[] = "Tituloposgrado.cd_titulo as Tituloposgrado_oid ";
        $fields[] = "Tituloposgrado.ds_titulo as Tituloposgrado_ds_titulo ";
        
        $fields[] = "$tUniversidad.cd_universidad as UniversidadDocente_oid ";
        $fields[] = "$tUniversidad.ds_universidad as UniversidadDocente_ds_universidad ";
        
       
        
        return $fields;
	}
	
	

	
	
}
?>