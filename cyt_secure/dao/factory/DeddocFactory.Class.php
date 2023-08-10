<?php

/**
 * Factory para Deddoc
 *  
 * @author Marcos
 * @since 30-10-2013
 */
class DeddocFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('DedDoc');
        $deddoc = parent::build($next);
        if(array_key_exists('cd_deddoc',$next)){
        	$deddoc->setOid( $next["cd_deddoc"] );
        }

        return $deddoc;
    }

}
?>
