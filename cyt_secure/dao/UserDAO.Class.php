<?php

/**
 * DAO para User
 *
 * @author Marcos
 * @since 09-11-2013
 */
class UserDAO extends EntityDAO {

	public function getTableName(){
		return CYT_TABLE_CDT_USER;
	}

	public function getEntityFactory(){
		return new UserFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["ds_username"] = $this->formatString( $entity->getDs_username() );
		$fieldsValues["ds_name"] = $this->formatString( $entity->getDs_name() );
		$fieldsValues["ds_email"] = $this->formatString( $entity->getDs_email() );
		$fieldsValues["ds_password"] = $this->formatString( $entity->getDs_password() );
		$fieldsValues["ds_phone"] = $this->formatString( $entity->getDs_phone() );
		$fieldsValues["ds_address"] = $this->formatString( $entity->getDs_address() );
		$fieldsValues["ds_ips"] = $this->formatString( $entity->getDs_ips() );
		
		$fieldsValues["nu_attemps"] = $this->formatIfNull( $entity->getNu_attemps(), '0' );
	
		$fieldsValues["facultad_oid"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );

		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();

		
		
		$fieldsValues["ds_name"] = $this->formatString( $entity->getDs_name() );
		$fieldsValues["ds_email"] = $this->formatString( $entity->getDs_email() );
		$fieldsValues["ds_password"] = $this->formatString( $entity->getDs_password() );
		$fieldsValues["ds_phone"] = $this->formatString( $entity->getDs_phone() );
		$fieldsValues["ds_address"] = $this->formatString( $entity->getDs_address() );
		$fieldsValues["ds_ips"] = $this->formatString( $entity->getDs_ips() );
		
		$fieldsValues["nu_attemps"] = $this->formatIfNull( $entity->getNu_attemps(), '0' );
	
		$fieldsValues["facultad_oid"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tUser = $this->getTableName();
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		
		
        $sql  = parent::getFromToSelect();
       
       	 $sql .= " LEFT JOIN " . $tFacultad . " ON($tUser.facultad_oid = $tFacultad.cd_facultad)";
        
        
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        
       $fields[] = "$tFacultad.cd_facultad as " . $tFacultad . "_oid ";
        $fields[] = "$tFacultad.ds_facultad as " . $tFacultad . "_ds_facultad ";
       
       
        return $fields;
	}	
	
	

}
?>