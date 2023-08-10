<?php

/**
 * Factory para Facultad
 *  
 * @author Marcos
 * @since 21-10-2013
 */
class FacultadFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Facultad');
        $facultad = parent::build($next);
        if(array_key_exists('cd_facultad',$next)){
        	$alias = $this->getAlias();
        	$facultad->setOid( ($alias=='FacultadPlanilla_')?$next["cd_facultadplanilla"]:$next["cd_facultad"] );
        }

        $factory = new CatFactory();
        $factory->setAlias( CYT_TABLE_CAT . "_" );
        $facultad->setCat( $factory->build($next) );
        
        return $facultad;
    }

}
?>
