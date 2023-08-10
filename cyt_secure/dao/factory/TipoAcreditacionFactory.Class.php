<?php

/**
 * Factory para TipoAcreditacion
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class TipoAcreditacionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoAcreditacion');
        $tipoAcreditacion = parent::build($next);
        if(array_key_exists('cd_tipoAcreditacion',$next)){
        	$tipoAcreditacion->setOid( $next["cd_tipoAcreditacion"] );
        }

        return $tipoAcreditacion;
    }

}
?>
