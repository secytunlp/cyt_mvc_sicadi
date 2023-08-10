<?php

/**
 * Factory para UnidadAprobada
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class UnidadAprobadaFactory extends CdtGenericFactory {

    public function build($next) {

    	
        $this->setClassName('UnidadAprobada');
        $unidadaprobada = parent::build($next);
       
    	if(array_key_exists('cd_unidadaprobada',$next)){
			$unidadaprobada->setOid( $next["cd_unidadaprobada"] );
    	}
        
        $factory = new LugarTrabajoFactory();
        $factory->setAlias( CYT_TABLE_LUGAR_TRABAJO. "_" );
        $unidadaprobada->setUnidad( $factory->build($next) );
        
        $factory = new PeriodoFactory();
        $factory->setAlias( CYT_TABLE_PERIODO. "_" );
        $unidadaprobada->setPeriodo( $factory->build($next) );
        
        return $unidadaprobada;
    }

}
?>
