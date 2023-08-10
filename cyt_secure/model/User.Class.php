<?php 

/** 
 * User class 
 *  
 * @author Marcos
 * @since 09-11-2013
 */ 
class User extends Entity{
	
	//variables de instancia.
	
	
	
	private $ds_username;
	
	private $ds_name;
	
	private $ds_email;
	
	private $ds_password;
	
	private $ds_phone;
	
	private $ds_address;

	private $functions;
	
	private $ds_ips;

	private $nu_attemps;
	
	private $facultad;
	
	private $userGroup;
	
	//.
	private $usergroups;
	
	//Constructor.
	public function __construct() { 
		//inicializar variables.
		
		
		
		$this->ds_username = '';
		
		$this->ds_name = '';
		
		$this->ds_email = '';
		
		$this->ds_password = '';
		
		$this->ds_phone = '';
		
		$this->ds_address = '';
		
		$this->ds_ips = "";
		
		$this->nu_attemps = 0;
		
		$this->userGroup = new CdtUserGroup();
		
		$this->facultad = new Facultad();
		
		$this->usergroups = new ItemCollection();
	}

	//Getters	
		
	
		
	public function getDs_name() { 
		return $this->ds_name;
	}
		
	public function getDs_email() { 
		return $this->ds_email;
	}
		
	public function getDs_password() { 
		return $this->ds_password;
	}
		
	
	public function getDs_phone() { 
		return $this->ds_phone;
	}
		
	public function getDs_address() { 
		return $this->ds_address;
	}
	
		
		

	//Setters
	
	public function setCd_user( $value ) { 
		$this->cd_user = $value;
	}
	
	public function setDs_username( $value ) { 
		$this->ds_username = $value;
	}
	
	public function setDs_name( $value ) { 
		$this->ds_name = $value;
	}
	
	public function setDs_email( $value ) { 
		$this->ds_email = $value;
	}
	
	public function setDs_password( $value ) { 
		$this->ds_password = $value;
	}
	
	
	
	public function setDs_phone( $value ) { 
		$this->ds_phone = $value;
	}
	
	public function setDs_address( $value ) { 
		$this->ds_address = $value;
	}
	
	
	
	

	public function getFunctions()
	{
	    return $this->functions;
	}

	public function setFunctions($functions)
	{
	    $this->functions = $functions;
	}



	public function getDs_ips()
	{
	    return $this->ds_ips;
	}

	public function setDs_ips($ds_ips)
	{
	    $this->ds_ips = $ds_ips;
	}

	public function getNu_attemps()
	{
	    return $this->nu_attemps;
	}

	public function setNu_attemps($nu_attemps)
	{
	    $this->nu_attemps = $nu_attemps;
	}

	public function getDs_username()
	{
	    return $this->ds_username;
	}

	public function getUserGroup()
	{
	    return $this->userGroup;
	}

	public function setUserGroup($userGroup)
	{
	    $this->userGroup = $userGroup;
	}

	public function getUsergroups()
	{
	    return $this->usergroups;
	}

	public function setUsergroups($usergroups)
	{
	    $this->usergroups = $usergroups;
	}

	public function getFacultad()
	{
	    return $this->facultad;
	}

	public function setFacultad($facultad)
	{
	    $this->facultad = $facultad;
	}
	
	public function __toString(){
		
		return $this->getDs_name();
	}
} 
?>
