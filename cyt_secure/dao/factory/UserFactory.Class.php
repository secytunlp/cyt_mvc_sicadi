<?php

/**
 * Factory para User 
 *  
 * @author Marcos
 * @since 09-11-2013
 */
class UserFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('User');
        $user = parent::build($next);

        $factory = new FacultadFactory();
        $factory->setAlias( CYT_TABLE_FACULTAD . "_" );
        $user->setFacultad( $factory->build($next) );
                
        return $user;
    }
}
?>
