<?php

/**
 * Factory para Titulo
 *  
 * @author Marcos
 * @since 12-12-2013
 */
class TituloFactory extends CdtGenericFactory {

    public function build($next) {

    	
        $this->setClassName('Titulo');
        $titulo = parent::build($next);
       
    	if(array_key_exists('cd_titulo',$next)){
			$alias = $this->getAlias();
			switch ($alias) {
        		case 'Tituloposgrado_':
            		$titulo->setOid( $next["cd_titulopost"] );
            		break;
            	default:
            		$titulo->setOid( $next["cd_titulo"] );
            		break;
          	}	
		
		
        }
        
        $factory = new UniversidadFactory();
        $factory->setAlias( CYT_TABLE_UNIVERSIDAD . "_" );
        $titulo->setUniversidad( $factory->build($next) );
        
        return $titulo;
    }

}
?>
