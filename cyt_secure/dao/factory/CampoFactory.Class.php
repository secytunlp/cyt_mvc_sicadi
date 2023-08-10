<?php

/**
 * Factory para Campo
 *  
 * @author Marcos
 * @since 18-09-2017
 */
class CampoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Campo');
        $campo = parent::build($next);
        if(array_key_exists('cd_campo',$next)){
        	$campo->setOid( $next["cd_campo"] );
        }

        return $campo;
    }

}
?>
