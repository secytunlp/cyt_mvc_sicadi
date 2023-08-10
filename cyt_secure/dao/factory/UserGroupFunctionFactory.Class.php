<?php

/**
 * Factory para UserGroup Function
 *  
 * @author Marcos
 * @since 10-11-2013
 */
class UserGroupFunctionFactory extends CdtGenericFactory {

    public function build($next) {

        $this->setClassName('UserGroupFunction');
        $userUserGroup = parent::build($next);

        
    	if(array_key_exists('cdt_function_ds_function',$next)){
			
			$factory = new CdtFunctionFactory();
			$factory->setAliasFunction('cdt_function');
			$userUserGroup->setFunction( $factory->build($next) );
		}
        
        
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
