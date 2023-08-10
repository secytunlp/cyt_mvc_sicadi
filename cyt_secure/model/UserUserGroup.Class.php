<?php

/**
 * User UserGroup
 *
 * @author Marcos
 * @since 09-11-2013
 */

class UserUserGroup extends Entity{

	//variables de instancia.
	
	private $user;
	
	private $userGroup;
	
	
	
	
	
	
	


	public function __construct(){
		 
		$this->user = new User();
		
		$this->userGroup = new CdtUserGroup();
		
		
		
		
	}


	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getUserGroup()
	{
	    return $this->userGroup;
	}

	public function setUserGroup($userGroup)
	{
	    $this->userGroup = $userGroup;
	}
}
?>