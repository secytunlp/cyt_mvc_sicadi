<?php

/**
 * DAO para Registration
 *
 * @author Marcos
 * @since 14-05-2014
 */
class RegistrationDAO extends EntityDAO {

	public function getTableName(){
		return CDT_SECURE_TABLE_CDTREGISTRATION;
	}

	public function getEntityFactory(){
		return new RegistrationFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["ds_activationcode"] = $this->formatString( $entity->getDs_activationcode() );
		$fieldsValues["dt_date"] = $this->formatString( $entity->getDt_date() );
		$fieldsValues["ds_username"] = $this->formatString( $entity->getDs_username() );
		$fieldsValues["ds_name"] = $this->formatString( $entity->getDs_name() );
		$fieldsValues["ds_email"] = $this->formatString( $entity->getDs_email() );
		$fieldsValues["ds_password"] = $this->formatString( $entity->getDs_password() );
		$fieldsValues["ds_phone"] = $this->formatString( $entity->getDs_phone() );
		$fieldsValues["ds_address"] = $this->formatString( $entity->getDs_address() );
		
	
		$fieldsValues["facultad_oid"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );

		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();

		
		$fieldsValues["ds_activationcode"] = $this->formatString( $entity->getDs_activationcode() );
		$fieldsValues["ds_name"] = $this->formatString( $entity->getDs_name() );
		$fieldsValues["ds_email"] = $this->formatString( $entity->getDs_email() );
		$fieldsValues["ds_password"] = $this->formatString( $entity->getDs_password() );
		$fieldsValues["ds_phone"] = $this->formatString( $entity->getDs_phone() );
		$fieldsValues["ds_address"] = $this->formatString( $entity->getDs_address() );
		
		$fieldsValues["facultad_oid"] = $this->formatIfNull( $entity->getFacultad()->getOid(), 'null' );
		
		
		
		
		
		

		return $fieldsValues;
	}
	
	public function getIdFieldName(){
		return "cd_registration";
	}
	
	public function getFromToSelect(){
		
		$tRegistration = $this->getTableName();
		
		$tFacultad = CYTSecureDAOFactory::getFacultadDAO()->getTableName();
		
		
		
        $sql  = parent::getFromToSelect();
       
       	 $sql .= " LEFT JOIN " . $tFacultad . " ON($tRegistration.facultad_oid = $tFacultad.cd_facultad)";
        
        
       
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