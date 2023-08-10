<?php

/**
 * Factory para SolicitudEstado
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class SolicitudEstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('SolicitudEstado');
        $solicitudEstado = parent::build($next);
        
    	$factory = new EstadoFactory();
        $factory->setAlias( CYT_TABLE_ESTADO. "_" );
        $solicitudEstado->setEstado( $factory->build($next) );
        
        $factory = new SolicitudFactory();
        $factory->setAlias( CYT_TABLE_SOLICITUD. "_" );
        $solicitudEstado->setSolicitud( $factory->build($next) );
        
        $factory = new DocenteFactory();
        $factory->setAlias( CYT_TABLE_DOCENTE . "_" );
        $solicitudEstado->setDocente( $factory->build($next) );
        
    	if(array_key_exists('ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CYT_TABLE_CDT_USER . "_" );
        	$solicitudEstado->setUser( $factory->build($next) );
		}

        return $solicitudEstado;
    }

}
?>
