<?php

/**
 * Factory para Categoria
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class CategoriaFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Categoria');
        $categoria = parent::build($next);
        if(array_key_exists('cd_categoria',$next)){
        	$alias = $this->getAlias();
			CdtUtils::log('alias: '.$alias);
			switch ($alias) {
        		case 'Categoriasolicitada_':
            		$categoria->setOid( $next["cd_categoriasolicitada"] );
            		break;
            	default:
            		$categoria->setOid( $next["cd_categoria"] );
            		break;
          	}	
        }

        return $categoria;
    }

}
?>
