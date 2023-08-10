<?php

/**
 * Factory para LugarTrabajo
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class LugarTrabajoFactory extends CdtGenericFactory {
   
    public function build($next) {

        $this->setClassName('LugarTrabajo');
        $lugarTrabajo = parent::build($next);
        
		if(array_key_exists('cd_unidad',$next)){
			$alias = $this->getAlias();
			switch ($alias) {
        		case 'LugarTrabajoBeca_':
            		$lugarTrabajo->setOid( $next["cd_unidadbeca"] );
            		break;
            	case 'LugarTrabajoCarrera_':
            		$lugarTrabajo->setOid( $next["cd_unidadcarrera"] );
            		break;
            	default:
            		$lugarTrabajo->setOid( $next["cd_unidad"] );
            		break;
          	}	
		
		
        }
        

	$lugarTrabajoPadre = new LugarTrabajo();
	$lugarTrabajoPadre->setDs_unidad( $next["PADRE_ds_unidad"] );
	$lugarTrabajoPadre->setOid( $next["PADRE_cd_unidad"] );
	$lugarTrabajoPadre->setDs_sigla( $next["PADRE_ds_sigla"] );

        $lugarTrabajo->setPadre( $lugarTrabajoPadre );
	
        return $lugarTrabajo;
    }

}
?>
