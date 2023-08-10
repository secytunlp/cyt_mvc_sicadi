<?php

/**
 * Factory para Organismo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class OrganismoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Organismo');
        $organismo = parent::build($next);
        if(array_key_exists('cd_organismo',$next)){
        	$organismo->setOid( $next["cd_organismo"] );
        }

        return $organismo;
    }

}
?>
