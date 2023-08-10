<?php

/**
 * Factory para NoRendidas
 *  
 * @author Marcos
 * @since 22-05-2014
 */
class NoRendidasFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('NoRendidas');
        $noRendidas = parent::build($next);
       
        $factory = new DocenteFactory();
        $factory->setAlias( CYT_TABLE_DOCENTE . "_" );
        $noRendidas->setDocente( $factory->build($next) );
        
        return $noRendidas;
    }

}
?>
