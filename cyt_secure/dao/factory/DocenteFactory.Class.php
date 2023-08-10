<?php

/**
 * Factory para Docente
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class DocenteFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Docente');
        $docente = parent::build($next);
        if(array_key_exists('cd_docente',$next)){
        	$docente->setOid( $next["cd_docente"] );
        }
        
        $factory = new CategoriaFactory();
        $factory->setAlias( CYT_TABLE_CATEGORIA . "_" );
        $docente->setCategoria( $factory->build($next) );
        
        $factory = new CarrerainvFactory();
        $factory->setAlias( CYT_TABLE_CARRERAINV . "_" );
        $docente->setCarrerainv( $factory->build($next) );
        
        $factory = new OrganismoFactory();
        $factory->setAlias( CYT_TABLE_ORGANISMO . "_" );
        $docente->setOrganismo( $factory->build($next) );
        
        $factory = new CargoFactory();
        $factory->setAlias( CYT_TABLE_CARGO . "_" );
        $docente->setCargo( $factory->build($next) );
        
        $factory = new DeddocFactory();
        $factory->setAlias( CYT_TABLE_DEDDOC . "_" );
        $docente->setDeddoc( $factory->build($next) );
        
        $factory = new FacultadFactory();
        $factory->setAlias( CYT_TABLE_FACULTAD . "_" );
        $docente->setFacultad( $factory->build($next) );
        
        $factory = new LugarTrabajoFactory();
        $factory->setAlias( CYT_TABLE_UNIDAD . "_" );
        $docente->setLugarTrabajo( $factory->build($next) );
        
        $factory = new TituloFactory();
        $factory->setAlias( CYT_TABLE_TITULO . "_" );
        $docente->setTitulo( $factory->build($next) );
        
        $factory = new TituloFactory();
        $factory->setAlias( "Tituloposgrado_" );
        $docente->setTitulopost( $factory->build($next) );
        
        $factory = new UniversidadFactory();
        $factory->setAlias( "UniversidadDocente_" );
        $docente->setUniversidad( $factory->build($next) );
       
        return $docente;
    }

}
?>
