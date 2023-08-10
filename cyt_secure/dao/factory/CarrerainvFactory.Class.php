<?php

/**
 * Factory para Carrerainv
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CarrerainvFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('CarreraInv');
        $carrerainv = parent::build($next);
        if(array_key_exists('cd_carrerainv',$next)){
        	$carrerainv->setOid( $next["cd_carrerainv"] );
        }

        return $carrerainv;
    }

}
?>
