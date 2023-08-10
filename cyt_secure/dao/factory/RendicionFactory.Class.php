<?php

/**
 * Factory para Rendicion
 *  
 * @author Marcos
 * @since 08-06-2013
 */
class RendicionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Rendicion');
        $rendicion = parent::build($next);
    	
    	if(array_key_exists('docente_ds_apellido',$next)){
        	$rendicion->setDs_investigador( $next["docente_ds_apellido"].", ".$next["docente_ds_nombre"] );
        }
    	$factory = new EstadoFactory();
        $factory->setAlias( CYT_TABLE_ESTADO. "_" );
        $rendicion->setEstado( $factory->build($next) );
        
        $factory = new SolicitudFactory();
        $factory->setAlias( CYT_TABLE_SOLICITUD. "_" );
        $rendicion->setSolicitud( $factory->build($next) );
        
        

        return $rendicion;
    }

}
?>
