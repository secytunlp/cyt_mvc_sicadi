<?php

/**
 * UserGroup Function 
 *
 * @author Marcos
 * @since 10-11-2013
 */

class UserGroupFunction extends Entity{

	//variables de instancia.
	
	private $function;
	
	private $userGroup;
	
	public function __construct(){
		 
		$this->function = new CdtFunction();
		
		$this->userGroup = new CdtUserGroup();
	
	}


	

	public function getFunction()
	{
	    return $this->function;
	}

	public function setFunction($function)
	{
	    $this->function = $function;
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