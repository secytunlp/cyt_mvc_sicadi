<?php

/**
 * Disciplina
 *
 * @author Marcos
 * @since 09-02-2015
 */

class Disciplina extends Entity{

	//variables de instancia.
	
	

	private $ds_disciplina;
	
	private $ds_codigo;
	

	public function __construct(){
		
		$this->ds_disciplina = '';
		
		$this->ds_codigo = "";
		
	}



	

	public function getDs_disciplina()
	{
	    return $this->ds_disciplina;
	}

	public function setDs_disciplina($ds_disciplina)
	{
	    $this->ds_disciplina = $ds_disciplina;
	}

	public function getDs_codigo()
	{
	    return $this->ds_codigo;
	}

	public function setDs_codigo($ds_codigo)
	{
	    $this->ds_codigo = $ds_codigo;
	}
}
?>