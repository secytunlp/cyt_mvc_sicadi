<?php

/**
 * Factory para Especialidad
 *  
 * @author Marcos
 * @since 09-02-2015
 */
class EspecialidadFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Especialidad');
        $especialidad = parent::build($next);
        if(array_key_exists('cd_especialidad',$next)){
        	$especialidad->setOid( $next["cd_especialidad"] );
        }

        return $especialidad;
    }

}
?>
