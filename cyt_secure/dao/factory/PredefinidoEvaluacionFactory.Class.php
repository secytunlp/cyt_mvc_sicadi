<?php

/**
 * Factory para PredefinidoEvaluacion
 *  
 * @author Marcos
 * @since 20-08-2019
 */
class PredefinidoEvaluacionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('PredefinidoEvaluacion');
        $predefinido = parent::build($next);
        if(array_key_exists('cd_predefinido',$next)){
        	$predefinido->setOid( $next["cd_predefinido"] );
        }

        return $predefinido;
    }

}
?>
