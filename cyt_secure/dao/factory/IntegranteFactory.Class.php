<?php

/**
 * Factory para Integrante
 *  
 * @author Marcos
 * @since 30-04-2014
 */
class IntegranteFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Integrante');
        $integrante = parent::build($next);
        if(array_key_exists('cd_integrante',$next)){
        	$integrante->setOid( $next["cd_integrante"] );
        }

        $factory = new DocenteFactory();
        $factory->setAlias(CYT_TABLE_DOCENTE. "_" );
        $integrante->setDocente( $factory->build($next) );
        
        
        
        
     
        
        return $integrante;
    }

}
?>
