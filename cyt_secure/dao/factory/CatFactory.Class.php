<?php

/**
 * Factory para Cat
 *  
 * @author Marcos
 * @since 14-11-2013
 */
class CatFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('Cat');
        $cat = parent::build($next);
        if(array_key_exists('cd_cat',$next)){
        	$cat->setOid( $next["cd_cat"] );
        }

        return $cat;
    }

}
?>
