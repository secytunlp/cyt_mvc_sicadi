<?php

/**
 * Factory para Proyecto
 *  
 * @author Marcos
 * @since 20-11-2013
 */
class ProyectoFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Proyecto');
        $proyecto = parent::build($next);
        if(array_key_exists('cd_proyecto',$next)){
        	$proyecto->setOid( $next["cd_proyecto"] );
        }

        $factory = new DocenteFactory();
        $factory->setAlias("DOCDIR_" );
        $proyecto->setDirector( $factory->build($next) );
        
        
        $factory = new FacultadFactory();
        $factory->setAlias( CYT_TABLE_FACULTAD . "_" );
        $proyecto->setFacultad( $factory->build($next) );
        
        $factory = new TipoEstadoProyectoFactory();
        $factory->setAlias( CYT_TABLE_TIPO_ESTADO_PROYECTO . "_" );
        $proyecto->setTipoEstadoProyecto( $factory->build($next) );
        
        $factory = new DisciplinaFactory();
        $factory->setAlias( CYT_TABLE_DISCIPLINA . "_" );
        $proyecto->setDisciplina( $factory->build($next) );
        
        $factory = new EspecialidadFactory();
        $factory->setAlias( CYT_TABLE_ESPECIALIDAD . "_" );
        $proyecto->setEspecialidad( $factory->build($next) );
        
     
        
        return $proyecto;
    }

}
?>
