<?php

/**
 * Factory para Beca
 *  
 * @author Marcos
 * @since 18-12-2013
 */
class BecaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Beca');
        $beca = parent::build($next);
        if(array_key_exists('cd_beca',$next)){
        	$beca->setOid( $next["cd_beca"] );
        }
        
        $factory = new DocenteFactory();
        $factory->setAlias( CYT_TABLE_DOCENTE . "_" );
        $beca->setDocente( $factory->build($next) );
        
        

        return $beca;
    }

}
?>
