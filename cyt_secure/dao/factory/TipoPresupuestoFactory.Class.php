<?php

/**
 * Factory para TipoPresupuesto
 *  
 * @author Marcos
 * @since 22-11-2013
 */
class TipoPresupuestoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('TipoPresupuesto');
        $tipoPresupuesto = parent::build($next);
        if(array_key_exists('cd_tipopresupuesto',$next)){
        	$tipoPresupuesto->setOid( $next["cd_tipopresupuesto"] );
        }

        return $tipoPresupuesto;
    }

}
?>
