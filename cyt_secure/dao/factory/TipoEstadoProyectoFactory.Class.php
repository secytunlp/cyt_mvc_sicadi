<?php

/**
 * Factory para TipoEstadoProyecto
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoEstadoProyectoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoEstadoProyecto');
        $estado = parent::build($next);
        if(array_key_exists('cd_estado',$next)){
        	$estado->setOid( $next["cd_estado"] );
        }

        return $estado;
    }

}
?>
