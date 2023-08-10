<?php

/**
 * Factory para EvaluacionEstado
 *  
 * @author Marcos
 * @since 03-12-2013
 */
class EvaluacionEstadoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('EvaluacionEstado');
        $evaluacionEstado = parent::build($next);
        
    	$factory = new EstadoFactory();
        $factory->setAlias( CYT_TABLE_ESTADO_EVALUACION. "_" );
        $evaluacionEstado->setEstado( $factory->build($next) );
        
        $factory = new EvaluacionFactory();
        $factory->setAlias( CYT_TABLE_SOLICITUD. "_" );
        $evaluacionEstado->setEvaluacion( $factory->build($next) );
        
        $factory = new UserFactory();
        $factory->setAlias( "U_" );
        $evaluacionEstado->setUser( $factory->build($next) );
        
        $factory = new UserFactory();
        $factory->setAlias( CYT_TABLE_CDT_USER . "_" );
        $evaluacionEstado->setUserMod( $factory->build($next) );
        
    	/*if(array_key_exists('cyt_user.ds_username',$next)){
			
			$factory = new CdtUserFactory();
        	//$factory->setAlias( CYT_TABLE_CDT_USER . "_" );
        	$evaluacionEstado->setUserMod( $factory->build($next) );
		}*/

        return $evaluacionEstado;
    }

}
?>
