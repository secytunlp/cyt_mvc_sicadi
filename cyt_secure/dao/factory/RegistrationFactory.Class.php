<?php

/**
 * Factory para Registration 
 *  
 * @author Marcos
 * @since 14-05-2014
 */
class RegistrationFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('CYTRegistration');
        $registration = parent::build($next);
    	if(array_key_exists('cd_registration',$next)){
        	$registration->setOid( $next["cd_registration"] );
        }

        $factory = new FacultadFactory();
        $factory->setAlias( CYT_TABLE_FACULTAD . "_" );
        $registration->setFacultad( $factory->build($next) );
        
   		
        
        return $registration;
    }
}
?>
