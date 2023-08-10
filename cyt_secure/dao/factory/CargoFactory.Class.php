<?php

/**
 * Factory para Cargo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CargoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Cargo');
        $cargo = parent::build($next);
        if(array_key_exists('cd_cargo',$next)){
        	$cargo->setOid( $next["cd_cargo"] );
        }

        return $cargo;
    }

}
?>
