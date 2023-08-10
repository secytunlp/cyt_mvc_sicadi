<?php

/**
 * Factory para Periodo
 *  
 * @author Marcos
 * @since 13-11-2013
 */
class PeriodoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Periodo');
        $periodo = parent::build($next);
        if(array_key_exists('cd_periodo',$next)){
        	$periodo->setOid( $next["cd_periodo"] );
        }

        return $periodo;
    }

}
?>
