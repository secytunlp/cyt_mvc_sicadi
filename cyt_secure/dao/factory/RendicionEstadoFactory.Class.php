<?php

/**
 * Factory para RendicionEstado
 *  
 * @author Marcos
 * @since 08-06-2015
 */
class RendicionEstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('RendicionEstado');
        $rendicionEstado = parent::build($next);
        
    	$factory = new EstadoFactory();
        $factory->setAlias( CYT_TABLE_ESTADO. "_" );
        $rendicionEstado->setEstado( $factory->build($next) );
        
        $factory = new RendicionFactory();
        $factory->setAlias( CYT_TABLE_SOLICITUD. "_" );
        $rendicionEstado->setRendicion( $factory->build($next) );
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CYT_TABLE_CDT_USER . "_" );
        	$rendicionEstado->setUser( $factory->build($next) );
		}
        

        return $rendicionEstado;
    }

}
?>
