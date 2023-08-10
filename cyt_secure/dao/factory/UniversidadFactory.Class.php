<?php

/**
 * Factory para Universidad
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class UniversidadFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Universidad');
        $universidad = parent::build($next);
        if(array_key_exists('cd_universidad',$next)){
        	$universidad->setOid( $next["cd_universidad"] );
        }

        return $universidad;
    }

}
?>
