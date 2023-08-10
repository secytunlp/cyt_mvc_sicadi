<?php

/**
 * Manager para UserGroup Function
 *  
 * @author Marcos
 * @since 10-11-2013
 */
class UserGroupFunctionManager extends EntityManager{

	public function getDAO(){
		return CYTSecureDAOFactory::getUserGroupFunctionDAO();
	}

	
	
	
	
	
}
?>
