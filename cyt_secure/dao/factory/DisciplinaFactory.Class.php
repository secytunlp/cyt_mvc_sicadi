<?php

/**
 * Factory para Disciplina
 *  
 * @author Marcos
 * @since 09-02-2015
 */
class DisciplinaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Disciplina');
        $disciplina = parent::build($next);
        if(array_key_exists('cd_disciplina',$next)){
        	$disciplina->setOid( $next["cd_disciplina"] );
        }

        return $disciplina;
    }

}
?>
