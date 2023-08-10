<?php

/**
 * Factory para User UserGroup
 *  
 * @author Marcos
 * @since 09-11-2013
 */
class UserUserGroupFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('UserUserGroup');
        $userUserGroup = parent::build($next);

        $factory = new UserFactory();
        $factory->setAlias( CYT_TABLE_CDT_USER . "_" );
        $userUserGroup->setUser( $factory->build($next) );
        
   		 //para el caso que se hace el join con el usergroup.
		if(array_key_exists('cdt_usergroup_ds_usergroup',$next)){
			
			$factory = new CdtUserGroupFactory();
			$factory->setAliasUserGroup('cdt_usergroup');
			$userUserGroup->setUserGroup( $factory->build($next) );
		}
        
        
        
   		
        
        return $userUserGroup;
    }
}
?>
