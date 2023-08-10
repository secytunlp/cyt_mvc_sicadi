<?php

/**
 * Factory para Estado
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class EstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Estado');
        $estado = parent::build($next);
        if(array_key_exists('cd_estado',$next)){
        	$estado->setOid( $next["cd_estado"] );
        }

        return $estado;
    }

}
?>
